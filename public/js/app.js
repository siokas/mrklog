//Get the pre_tags value from the hidden input
var preTags = $("#pre_tags").val();

/*global Vue, todoStorage */
(function (exports) {

	'use strict';

	var filters = {
		all: function (todos) {
			return todos;
		},
		active: function (todos) {
			return todos.filter(function (todo) {
				return !todo.completed;
			});
		},
		completed: function (todos) {
			return todos.filter(function (todo) {
				return todo.completed;
			});
		}
	};

	exports.app = new Vue({

		// the root element that will be compiled
		el: '.todoapp',

		// app initial state
		data: {
			todos: [],
			newTodo: '',
			editedTodo: null,
			visibility: 'all',
			tags: ''
		},

		ready: function(){
			todoStorage.clear();
			var list = '';
			list = preTags.split(',');
			var self = this;
			list.forEach(function(item){
				if(item != '')
				self.todos.push({ title: item, completed: false });		
			});	
			
		},

		// watch todos change for localStorage persistence
		watch: {
			todos: {
				handler: function (todos) {
					todoStorage.save(todos);
				},
				deep: true
			}
		},

		// computed properties
		// http://vuejs.org/guide/computed.html
		computed: {
			filteredTodos: function () {
				return filters[this.visibility](this.todos);
			},
			remaining: function () {
				return filters.active(this.todos).length;
			},
			allDone: {
				get: function () {
					return this.remaining === 0;
				},
				set: function (value) {
					this.todos.forEach(function (todo) {
						todo.completed = value;
					});
				}
			},
			allTags: function(){
				var tags = '';
				this.todos.forEach(function(tag){
					tags += (tag.title.replace(" ", "_")) + ",";
				})

				return tags.slice(0, -1);
			}
		},

		// methods that implement data logic.
		// note there's no DOM manipulation here at all.
		methods: {

			addTodo: function () {
				var value = this.newTodo && this.newTodo.trim();
				if (!value) {
					return;
				}
				this.todos.push({ title: value, completed: false });
				this.newTodo = '';
			},

			removeTodo: function (todo) {
				this.todos.$remove(todo);
			},


			doneEdit: function (todo) {
				if (!this.editedTodo) {
					return;
				}
				this.editedTodo = null;
				todo.title = todo.title.trim();
				if (!todo.title) {
					this.removeTodo(todo);
				}
			},

			cancelEdit: function (todo) {
				this.editedTodo = null;
				todo.title = this.beforeEditCache;
			},

			csv: function(){
				return this.allTags;
			}

		},

		// a custom directive to wait for the DOM to be updated
		// before focusing on the input field.
		// http://vuejs.org/guide/custom-directive.html
		directives: {
			'todo-focus': function (value) {
				if (!value) {
					return;
				}
				var el = this.el;
				Vue.nextTick(function () {
					el.focus();
				});
			}
		}
	});

})(window);
