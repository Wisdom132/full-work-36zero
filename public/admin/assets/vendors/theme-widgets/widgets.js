/* Todo Widget
 * --------------------
 *  Fetches latest tweets for the user provided
 *  in the plugin options.
 */


var Todo = function Todo(node) {
  var tasks = [];

  // Initialise list from the node
  var lists = node.getElementsByTagName('li');
  for( var i = 0; i < lists.length; i++ ) {
    var item = {
      text: lists[i].innerHTML,
      checked: JSON.parse( JSON.stringify( lists[i].dataset ) ).checked ? true : false
    };
    tasks.push(item);
  }

  // Todo App
  var Todo = {
    data: {
      tasks: [],
    },
    oninit: function(vnode) {
      vnode.state.data.tasks = tasks;
    },
    view: function(vnode) {
      var self = this;
      var ctrl = this.ctrl(vnode);
      return [
        m('div.list-group', [
          vnode.state.data.tasks.map(function(item, index) {
            return [
              m('div', {
                class: 'list-group-item todo-item checkbox checkbox-info ' + ( item.checked ? ' checked' : ''),
              }, [
                m('label', [
                  m('input[type="checkbox"]', {
                    onchange: m.withAttr("value", ctrl.checkTask),
                    value: index,
                    checked: item.checked,
                  }),
                  m('span.label-text', item.text),
                ]),

                m('span.delete-item.material-icons', {
                  onclick: m.withAttr("value", ctrl.deleteTask),
                  value: index,
                }, 'delete'),

                m('span.edit-item.material-icons', {
                  onclick: m.withAttr("value", ctrl.editTask),
                  value: index,
                }, 'edit'),
              ]),
            ];
          }),
          m(this.noTaskMessage, { tasks: vnode.state.data.tasks } ),
        ]),
        m('input[type="text"].form-control', {
          onkeypress: ctrl.addTask,
          placeholder: 'add new task',
        }, 'Add task'),
      ];
    },

    ctrl: function( vnode ) {
      return {

        // Adding task on Enter Press of Input field
        addTask: function(e) {
          if( e.keyCode == 13 ) {
            var val = e.target.value;
            vnode.state.data.tasks.push( { text: val, checked: false } );
            e.target.value = '';
          }
        },

        // Check to task on click
        checkTask: function(index) {
          if( vnode.state.data.tasks[index] !== undefined)
            vnode.state.data.tasks[index].checked = !vnode.state.data.tasks[index].checked;
        },

        // Delete task
        deleteTask: function(index) {
          vnode.state.data.tasks.splice(index, 1);
        },

        // Edit Task by adding a text field in the list
        editTask: function(index) {
          var parentNode = this.parentNode;
          var labelText = parentNode.getElementsByClassName('label-text')[0];
          var text = labelText.innerHTML;
          labelText.style.display = "none";
          parentNode.getElementsByClassName('delete-item')[0].style.display = "none";
          parentNode.getElementsByClassName('edit-item')[0].style.display = "none";

          // View of the Text Field
          var EditField = {
            view: function() {
              var self = this;
              return [
                m('div.edit-field', [
                  m('form.mr-t-0', {
                    onsubmit: function( e ) {
                      var container = parentNode.getElementsByClassName('edit-container-field')[0];
                      var value = container.getElementsByTagName('input')[0].value;
                      vnode.state.data.tasks[index].text = value;
                      labelText.style.display = "block";
                      parentNode.getElementsByClassName('delete-item')[0].style.display = "block";
                      parentNode.getElementsByClassName('edit-item')[0].style.display = "block";
                      container.parentNode.removeChild( container );
                    }
                  }, m('input[type="text"].form-control', {
                    value: text,
                  }),
                    m('button[type="submit"].submit-btn.btn.btn-info', [
                      m('i.material-icons', 'send'),
                    ])
                  ),
                ]),
              ];
            }
          };

          var prevEditField = parentNode.parentNode.getElementsByClassName('edit-container-field');
          if ( prevEditField.length ) {
            var event = document.createEvent('HTMLEvents');
            event.initEvent('submit', true, false);
            prevEditField[0].getElementsByTagName('form')[0].dispatchEvent( event );
          }
          var editContainer = document.createElement('div');
          editContainer.classList.add('edit-container-field');
          parentNode.getElementsByTagName('label')[0].appendChild( editContainer );
          m.mount( editContainer, EditField );
        },
      };
    },
  };

  // View of Message when there is no task in the list
  Todo.noTaskMessage = {
    view: function(vnode) {
      if( vnode.attrs.tasks.length === 0 ) {
        return [
          m('div.list-group-item', [
            m('label', 'no tasks to display'),
          ]),
        ];
      }
      return null;
    }
  };

  return m.mount(node, Todo);
}




/* Twitter Feed Widgets
 * --------------------
 *  Fetches latest tweets for the user provided
 *  in the plugin options.
 */

var TwitterWidget = function TwitterWidget(node, options) {
  var WidgetOptions = options;

  var TweetsList = {
    view: function(vnode) {
      if ( vnode.attrs.tweets !== undefined ) {
        return vnode.attrs.tweets.map( function(tweet, index) {
          var hidden = index !== 0 ? 'hidden' : '';
          return m('div.status', {
            class: 'animated fadeInLeft',
            hidden: hidden,
          },[
            m('p', tweet.text),
          ]);
        });
      }
      return m('p', 'no items to show');
    },
  };

  var TwitterWidget = {
    data: {
      tweets: [],
      user: {
        name: 'John Doe',
        screen_name: 'johndoe',
        profile_image_url: 'assets/demo/users/user-image.png',
      },
    },
    oninit: function(vnode) {
      var ctrl = this.ctrl(vnode);
      ctrl.getQuery();
    },
    view: function(vnode) {
      var ctrl = this.ctrl(vnode);
      return [
        m('div.status-container', [
          m('div.user-info', [
            m('img.user-profile-picture', { src: vnode.state.data.user.profile_image_url, alt: vnode.state.data.user.screen_name + ' profile picture'  }),
            m('h5.user-name', vnode.state.data.user.name),
            m('h6.user-screen-name', '@' + vnode.state.data.user.screen_name),
          ]),
          m( TweetsList, { oncreate: ctrl.slideTweets, tweets: vnode.state.data.tweets } ),
        ]),
      ];
    },
    ctrl: function(vnode) {
      return {
        getQuery: function() {
          var queryString = "";
          queryString = m.buildQueryString(JSON.parse(WidgetOptions));
          queryString = '?' + queryString;
          var url = 'assets/vendors/theme-widgets/getTwitterFeed.php' + queryString;
          m.request({
            method: "GET",
            url: url,
            callbackKey: 'none'
          }).then( function(results) {
            if ( results.error === undefined ) {
              vnode.state.data.tweets = JSON.parse( JSON.stringify(results) );
              vnode.state.data.user = vnode.state.data.tweets[0].user;
            }
            else
              console.error( results );
          }).catch( console.error );
        },

        slideTweets: function() {
          var current = 0;
          var statusDoms = vnode.dom.getElementsByClassName('status');
          function showSlide() {
            if ( vnode.state.data.tweets.length === 0 ) return;

            var prev = current - 1;
            if ( prev == -1 ) prev = vnode.state.data.tweets.length - 1;

            var currentStatusNode = statusDoms[current];
            if ( currentStatusNode !== undefined )
              currentStatusNode.hidden = '';

            var prevStatusNode = statusDoms[prev];
            if ( prevStatusNode !== undefined )
              prevStatusNode.hidden = 'hidden';

            if ( current == vnode.state.data.tweets.length - 1 ) current = 0;
            else current++;
          }
          showSlide();
          setInterval(showSlide, 5000);
        },
      };
    },
  };

  var App = {
    view: function(vnode) {
      return m('h4','jfdkas');
    },
  };

  m.mount( node, TwitterWidget );
}




/* Facebook Feed Widget
 * --------------------
 *  Fetches latest tweets for the user provided
 *  in the plugin options.
 */

var FacebookWidget = function FacebookWidget(node, options) {
  var WidgetOptions = options;
  var FacebookList = {
    view: function(vnode) {
      if ( vnode.attrs.statuses !== undefined ) {
        return [
          vnode.attrs.statuses.map(function(status, index) {
            var hidden = ( index !== 0 ) ? 'hide' : '';
            return m('div.status', {
              class: "animated fadeInLeft",
              hidden: hidden,
            },[
              m('p', status.message.length > 160 ? status.message.substring(0, 160) : status.message),
            ]);
          }),
        ];
      }

      return m('p','no posts to show');
    },
  };

  var FacebookWidget = {
    data: {
      statuses: [],
      user: {
        name: 'John Doe',
        username: 'johndoe',
        picture: {
          data: {
            url: 'assets/demo/users/user-image.png',
          }
        }
      }
    },
    oninit: function(vnode) {
      var ctrl = this.ctrl(vnode);
      ctrl.fetchStatus();
    },
    view: function(vnode) {
      var ctrl = this.ctrl(vnode);
      return [
        m('div.status-container',[
          m('div.user-info',[
            m('img.user-profile-picture', { src: vnode.state.data.user.picture.data.url }),
            m('h5.user-name', vnode.state.data.user.username),
            m('h6.user-screen-name', vnode.state.data.user.username),
          ]),
          m(FacebookList, { oncreate: ctrl.slideStatus, statuses: vnode.state.data.statuses } ),
        ]),
      ];
    },

    ctrl: function(vnode) {
      return {
        fetchStatus: function() {
          var queryString = "";
          queryString = m.buildQueryString(JSON.parse(WidgetOptions));
          queryString = '?' + queryString;
          var url = 'assets/vendors/theme-widgets/getFacebookFeed.php' + queryString;
          m.request({
            method: 'GET',
            url: url,
            callbackKey: 'none'
          }).then(function(results) {
            if ( results.error === undefined ) {
              vnode.state.data.statuses = results[0].data;
              vnode.state.data.user = results[1];
            }
            else {
              results.dom = node;
              console.error( results );
            }
          }).catch(function(err) {
            err.dom = node;
            console.error( err );
          });
        },

        slideStatus: function() {
          var current = 0;
          var statusDoms = vnode.dom.getElementsByClassName('status');
          function showSlide() {
            var prev = current - 1;
            if ( prev == -1 ) prev = vnode.state.data.statuses.length - 1;

            var currentStatusNode = statusDoms[current];
            if ( currentStatusNode !== undefined )
              currentStatusNode.hidden = '';

            var prevStatusNode = statusDoms[prev];
            if ( prevStatusNode !== undefined )
              prevStatusNode.hidden = 'hidden';

            if ( current == vnode.state.data.statuses.length - 1 ) current = 0;
            else current++;
          }
          showSlide();
          setInterval(showSlide, 5000);
        },
      };
    },
  };

  m.mount( node, FacebookWidget);
}


/* Kanban System
 * --------------------
 *  Basic Kanban System inspired from Trello
 */

var KanbanWidget = function(node) {
  var MEMBERS = [];

  var TASK_MODAL_DATA = {};

  var TASK_DRAG = {
    width: null,
    height: null,
    overElement: null,
  };

  var BACKGROUND_LIST = [
    { name: 'Color Scheme', class: 'color-scheme' },
    { name: 'Success', class: 'success' },
    { name: 'Primary', class: 'primary' },
    { name: 'Danger', class: 'danger' },
    { name: 'Warning', class: 'warning' },
    { name: 'Purple', class: 'purple' },
    { name: 'Info', class: 'info' },
  ];

  var TASKS_DATA = {
    tasks: [],
    members: [],
    categories: [],
  };

  window.TASKS_DATA = TASKS_DATA;

  var TaskModal = {
    data: {
      editDescription: false,
    },
    oncreate: function(vnode) {
      $(vnode.dom).find('[data-toggle="tooltip"]').tooltip('dispose');
      $(vnode.dom).find('[data-toggle="tooltip"]').tooltip();
    },
    onupdate: function(vnode) {
      $(vnode.dom).find('[data-toggle="tooltip"]').tooltip('dispose');
      $(vnode.dom).find('[data-toggle="tooltip"]').tooltip();
    },
    view: function(vnode) {
      var ctrl = this.ctrl(vnode);
      return [
        m('div', [
          m('div.modal-backdrop.fade.show', { onclick: ctrl.closeModal },  null),
          m('div.modal.animated.fadeIn', { style: { display: "block", overflowY: 'auto' } } , [
            m('div.modal-dialog.modal-lg', [
              m('div.modal-content', [
                m('div.modal-header', [
                  m('h5.modal-title',
                    { onclick: ctrl.titleEditable,
                      onkeypress: ctrl.enterTitle,
                      onfocusout: m.withAttr('innerHTML', ctrl.saveTitle),
                      contentEditable: true,
                    }, TASK_MODAL_DATA.task.title),
                  m('button.close', { style: { cursor: "pointer" }, onclick: ctrl.closeModal } , [
                    m('span.material-icons.md-18', 'close'),
                  ]),
                ]),
                m('div.modal-body', [
                  m('div.row', [
                    m('div.col-8', [
                      m('div', {
                        class: vnode.state.data.editDescription ? 'd-none' : 'd-block',
                        onclick: ctrl.descriptionEditable,
                        style: {
                          cursor: "pointer",
                        }
                      }, m.trust( TASK_MODAL_DATA.task.description ? marked(TASK_MODAL_DATA.task.description) : '<span class="text-muted">No content yet</span>'  ) ) ,
                      m('form', {
                        class: vnode.state.data.editDescription ? 'd-block' : 'd-none',
                        onsubmit: ctrl.saveDescription,
                      },[
                        m('div.form-group', [
                          m('textarea.form-control', { rows: 10 } , TASK_MODAL_DATA.task.description ),
                        ]),
                        m('button[type="submit"].btn.btn-success', 'Save'),
                        m('button[type="button"].btn.btn-link.color-content-color', { onclick: ctrl.cancelEditDescription }, [
                          m('span.material-icons', 'clear'),
                        ])
                      ]),
                    ]),

                    m('div.col-4', [

                      m('div.dropdown.mb-3', [
                        m('button[data-toggle="dropdown"].btn-block.d-flex.btn.btn-default.btn-sm',
                          { class: TASK_MODAL_DATA.task.label !== undefined ? "bg-" + TASK_MODAL_DATA.task.label.bg + " color-white" : null }, [
                          'Label',
                          m('span.flex-1', null),
                          m('i.material-icons', 'keyboard_arrow_down')
                        ]),
                        m('div.dropdown-menu', [
                          m('a[href="javascript:void(0)"].dropdown-item', { onclick: ctrl.removeLabel }, 'None'),
                          m('div.dropdown-divider', null),
                          BACKGROUND_LIST.map( function(bg) {
                            if ( TASK_MODAL_DATA.task.label !== undefined && bg.class == TASK_MODAL_DATA.task.label.bg )
                            return m('a[href="javascript:void(0)"].dropdown-item.mr-b-5.d-flex.justify-content-center.align-items-center',
                              { "data-label": bg.class, onclick: m.withAttr("data-label", ctrl.selectLabel), class: "bg-" + bg.class, style: { height: '30px', cursor: 'pointer' } }, [
                                m('i.material-icons.color-white.md-18','check'),
                              ]
                            )

                            return m('a[href="javascript:void(0)"].dropdown-item.mb-1', { "data-label": bg.class, onclick: m.withAttr("data-label", ctrl.selectLabel), class: "bg-" + bg.class, style: { height: '30px', cursor: 'pointer' } }, null )
                          })
                        ]),
                      ]),

                      m('div.dropdown.mb-3', [
                        m('button[data-toggle="dropdown"].btn-block.d-flex.btn.btn-default.btn-sm', [
                          'Users',
                          m('span.flex-1', null),
                          m('i.material-icons', 'keyboard_arrow_down')
                        ]),
                        ( MEMBERS !== undefined && MEMBERS.length ) ? m('div.dropdown-menu', MEMBERS.map( function(member) {
                          for(var i = 0; i < TASK_MODAL_DATA.task.members.length; i++ ) {
                            if(member.id == TASK_MODAL_DATA.task.members[i])
                            return m('a[href="javascript:void(0)"].dropdown-item.bg-primary.color-white', { "data-id": member.id, onclick: m.withAttr('data-id', ctrl.selectUser) } , m('span.d-flex', [ member.name, m('span.flex-1', null), m('i.material-icons.md-18','check')]));
                          }
                          return m('a[href="javascript:void(0)"].dropdown-item', { "data-id": member.id, onclick: m.withAttr('data-id', ctrl.selectUser) } , member.name)
                        })) : null,
                      ]),

                      ( TASK_MODAL_DATA.task.members !== undefined && TASK_MODAL_DATA.task.members.length ) ?  m('div.task-users.d-inline-block', TASK_MODAL_DATA.task.members.map( function(memberId) {
                        var memberObj = {};
                        for( var i = 0; i < MEMBERS.length; i++ ) {
                          if ( memberId == MEMBERS[i].id ) {
                            memberObj = MEMBERS[i];
                            break;
                          }
                        }
                        return [
                          m('figure.thumb-xs.d-inline-block.mr-2[data-toggle="tooltip"]', { title: memberObj.name } ,[
                            m('img.rounded-circle', { src: memberObj.avatar } )
                          ])
                        ];
                      })) : m('span', 'No users selected'),

                    ]),
                  ]),
                ]),
                m('div.modal-footer.justify-content-start', [
                  m('button.btn.btn-danger.btn-rounded', { onclick: ctrl.deleteTask }, [
                    m('i.material-icons.list-icon.align-middle.mr-2', 'delete'),
                    'Delete',
                  ]),
                  m('div.flex-1', null),
                  m('button.btn.btn-color-scheme.btn-rounded', { onclick: ctrl.closeModal }, [
                    m('i.material-icons.list-icon.align-middle.mr-2', 'clear'),
                    'Close',
                  ]),
                ]),
              ]),
            ]),
          ]),
        ]),
      ];
    },

    ctrl: function(vnode) {
      return {
        closeModal: function() {
          vnode.state.data.editDescription = false;
          vnode.state.data.editTitle = false;
          m.mount(document.getElementById('task-modal'), null);
          document.body.removeChild( document.getElementById('task-modal') );
        },

        descriptionEditable: function() {
          vnode.state.data.editDescription = true;
          vnode.dom.getElementsByTagName('textarea')[0].focus();
        },

        enterTitle: function(e) {
          if( e.keyCode == 13 ) {
            var event = document.createEvent('HTMLEvents');
            event.initEvent('focusout', true, false);
            this.dispatchEvent(event);
          }
        },

        saveTitle: function(text) {
          TASKS_DATA.tasks[TASK_MODAL_DATA.index].title = text.trim();
          window.getSelection().removeAllRanges();
        },

        saveDescription: function(e) {
          e.preventDefault();
          var form = this;
          TASKS_DATA.tasks[TASK_MODAL_DATA.index].description = form.getElementsByTagName('textarea')[0].value.trim();
          vnode.state.data.editDescription = false;
        },

        cancelEditDescription: function() {
          vnode.state.data.editDescription = false;
        },

        deleteTask: function() {
          swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then(function () {
            swal(
              'Deleted!',
              'Your task has been deleted.',
              'success'
            )
            TASKS_DATA.tasks.splice(TASK_MODAL_DATA.index,1);

            var event = document.createEvent('HTMLEvents');
            event.initEvent('click', true, false);
            vnode.dom.getElementsByClassName('close')[0].dispatchEvent(event);
          }).catch(function() {
            swal({
              title: 'Cancelled!',
              text: 'Deleting Task cancelled',
              type: 'error',
            })
          });
        },

        selectUser: function(id) {
          id = parseInt(id);
          var i = TASKS_DATA.tasks[TASK_MODAL_DATA.index].members.indexOf(id);
          if( i === -1 )
          TASKS_DATA.tasks[TASK_MODAL_DATA.index].members.push(id);
          else
          TASKS_DATA.tasks[TASK_MODAL_DATA.index].members.splice(i,1);
        },

        selectLabel: function(label) {
          TASKS_DATA.tasks[TASK_MODAL_DATA.index].label = {
            bg: label
          };
        },

        removeLabel: function() {
          delete TASKS_DATA.tasks[TASK_MODAL_DATA.index].label;
        }
      }
    }
  };

  var Task = {
    view: function(vnode) {
      var ctrl = this.ctrl(vnode);
      return [
        m('div.task-item',
          { draggable: true,
            ondragstart: ctrl.dragStart,
            ondragenter: ctrl.dragOver,
            ondragleave: ctrl.dragLeave,
            ondrop: ctrl.dragLeave,
            index: vnode.attrs.task.id,
            rank: vnode.attrs.task.rank,
            onclick: ctrl.loadModal
          }, [
          m('div.draggable-ghost', 'Ghost'),
          m('div', [
            vnode.attrs.task.label !== undefined ? m('i.material-icons.task-label', { class: "color-" + vnode.attrs.task.label.bg }, 'bookmark' ) : null,
            m('h6.fw-400.fs-16.task-title', vnode.attrs.task.title),
            m('p', vnode.attrs.task.rank),
            ( vnode.attrs.task.members !== undefined && vnode.attrs.task.members.length ) ?  m('div.task-users', vnode.attrs.task.members.map( function(memberId) {
              var memberObj = {};
              for( var i = 0; i < MEMBERS.length; i++ ) {
                if ( memberId == MEMBERS[i].id ) {
                  memberObj = MEMBERS[i];
                  break;
                }
              }
              return [
                m('figure.thumb-xs.d-inline-block[data-toggle="tooltip"]', m('img.rounded-circle', { src: memberObj.avatar } ) )
              ];
            })) : null,
          ]),
        ]),
      ];
    },

    ctrl: function(vnode) {
      return {
        loadModal: function() {
          TASK_MODAL_DATA = {
            task: vnode.attrs.task,
            index: TASKS_DATA.tasks.indexOf(vnode.attrs.task),
          };
          var taskModalNode = document.createElement('div');
          taskModalNode.id = 'task-modal';
          document.body.appendChild( taskModalNode );
          m.mount(taskModalNode, TaskModal);
        },

        dragStart: function(e) {
          e.dataTransfer.setData("task", vnode.attrs.task.id);
          e.dataTransfer.setData("task-width", vnode.dom.offsetWidth);
          e.dataTransfer.setData("task-height", vnode.dom.offsetHeight);
          TASK_DRAG.width = vnode.dom.offsetWidth;
          TASK_DRAG.height = vnode.dom.offsetHeight;
        },

        dragEnter: function(e) {
          vnode.dom.classList.add('over');
        },

        dragOver: function(e) {
          if(e.preventDefault) e.preventDefault();
          e.dataTransfer.dropEffect = 'move';
          return false;
        },

        dragLeave: function(e) {
          vnode.dom.classList.remove('over');
        }
      };
    },
  };

  var KanbanCategory = {
    view: function(vnode) {
      var ctrl = this.ctrl(vnode);

      var tasksForCat = [];

      for(var i = 0; i < TASKS_DATA.tasks.length; i++ ) {
        if ( TASKS_DATA.tasks[i].category == vnode.attrs.category.id )
        tasksForCat.push(TASKS_DATA.tasks[i]);
      }

      tasksForCat.sort(ctrl.taskSort);

      return [
        m('div.category-item', { ondrop: ctrl.droppedTask, ondragover: function(e){ e.preventDefault() }, "data-size": tasksForCat.length }, [
          m('h5.category-title', vnode.attrs.category.title + ' ' + vnode.attrs.category.id ),
          m('div.task-list', { category: vnode.attrs.category.id }, tasksForCat.map( function(task) {
            return m(Task, { task: task });
          })),
          m('button.btn-link.add-new-task.text-uppercase.fs-13', { onclick: ctrl.addTaskInput },  'Add new Task'),
        ]),
      ];
    },

    ctrl: function(vnode) {
      return {
        taskSort: function(a,b) {
          if(a.rank < b.rank) return -1;
          else if(a.rank > b.rank) return 1;
          else return 0;
        },

        addTaskInput: function() {
          var categoryList = vnode;
          var input = {
            view: function(vnode) {
              var ctrl = this.ctrl(vnode);
              return m('form', { onsubmit: ctrl.submitTask }, [
                m('div.input-group.mb-3', [
                  m('input[type="text"].form-control.task-title-input', { placeholder: "Enter Title" } ),
                  m('div.input-group-btn', [
                    m('button[type="button"].btn.btn-danger', { onclick: ctrl.cancelAddTask }, [
                      m('i.material-icons.md-18', 'clear'),
                    ])
                  ]),
                ]),
              ]);
            },

            ctrl: function(vnode) {
              return {
                cancelAddTask: function() {
                  m.mount(categoryList.dom.getElementsByClassName('input-div')[0], null);
                  categoryList.dom.removeChild(categoryList.dom.getElementsByClassName('input-div')[0]);
                },
                submitTask: function(e) {
                  e.preventDefault();
                  var inputValue = vnode.dom.getElementsByClassName('task-title-input')[0].value;
                  if ( inputValue.length ) {
                    var taskListEls = categoryList.dom.getElementsByClassName('task-list')[0].getElementsByClassName('task-item');
                    var rankOfLastTask = null;
                    if( taskListEls.length )
                    rankOfLastTask = parseInt(taskListEls[taskListEls.length-1].getAttribute('rank')) + 1;
                    else
                    rankOfLastTask = 1;

                    TASKS_DATA.tasks.push({
                      id: new Date().getTime(),
                      title: inputValue,
                      category: categoryList.attrs.category.id,
                      members: [],
                      rank: rankOfLastTask
                    });

                    categoryList.dom.removeChild(categoryList.dom.getElementsByClassName('input-div')[0]);
                  }
                },
              }
            },
          };

          if( vnode.dom.getElementsByClassName('input-div')[0] === undefined ) {
            var inputDiv = document.createElement('div');
            inputDiv.className = 'input-div';
            vnode.dom.insertBefore(inputDiv, vnode.dom.lastChild);
            m.mount(inputDiv, input);
          }
        },

        droppedTask: function(e) {
          e.preventDefault();
          var taskId = e.dataTransfer.getData("task");
          var task = null;
          var index = null;

          for(var i = 0; i < TASKS_DATA.tasks.length; i++) {
            if( TASKS_DATA.tasks[i].id === parseInt(taskId) ) {
              task = TASKS_DATA.tasks[i];
              break;
            }
          }

          index = TASKS_DATA.tasks.indexOf(task);
          TASKS_DATA.tasks[index].category = vnode.attrs.category.id;
        }
      }
    }
  };

  var KanbanContainer = {
    oninit: function(vnode) {
      var ctrl = this.ctrl(vnode);
      ctrl.getContent();
    },

    view: function(vnode) {
      var ctrl = this.ctrl(vnode);
      return [
        m('button.refreshBtn.d-none', { onclick: function(){ TASKS_DATA = TASKS_DATA } }, 'Refresh'),
        m('div.category-list.scrollbar-enabled', TASKS_DATA.categories.map( function(category) {
          return m( KanbanCategory, { category: category } );
        })),
      ]
    },

    ctrl: function(vnode) {
      return {
        getContent: function() {
          m.request({
            url: 'assets/js/kanban.json',
            method: 'GET',
          }).then( function(results) {
            TASKS_DATA.tasks = results.tasks;
            TASKS_DATA.categories = results.categories;
            MEMBERS = results.members;
          }).catch(function(err) {
            console.error( err )
          });
        },
      };
    },
  };
  m.mount(node,KanbanContainer);
}

window.Todo = Todo;
window.FacebookWidget = FacebookWidget;
window.TwitterWidget = TwitterWidget;
window.KanbanWidget = KanbanWidget;
