<nav>
    <ul class="pagination">
        <li v-if="pagination.current_page > 1">
        <button class="btn btn-default" @click.prevent="changePage(pagination.current_page - 1)">Previous</button>
        </li>

        <li v-if="pagination.current_page < pagination.last_page">
        <button class="btn btn-default" @click.prevent="changePage(pagination.current_page + 1)">Next</button>
        </li>
    </ul>
</nav>