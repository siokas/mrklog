<section class="todoapp">
	<header>
		<input class="new-todo"
			autocomplete="off"
			placeholder="Add Tags (Optional)"
			v-model="newTodo"
			@keyup.enter="addTodo">
	</header>
	<div class="main" v-show="todos.length" v-cloak>
		<ul class="todo-list">
			<li class="todo"
				v-for="todo in filteredTodos"
				:class="{completed: todo.completed, editing: todo == editedTodo}">
				<div class="view">
					<label>@{{todo.title}}</label>
					<button class="destroy" @click="removeTodo(todo)"></button>
				</div>
				<input class="edit" type="text"
					v-model="todo.title"
					v-todo-focus="todo == editedTodo"
					@keyup.enter="doneEdit(todo)"
					@keyup.esc="cancelEdit(todo)">
			</li>
		</ul>

	</div>
	<input type="hidden" value="@{{ csv() }}" name="tags" id="tags">
</section>