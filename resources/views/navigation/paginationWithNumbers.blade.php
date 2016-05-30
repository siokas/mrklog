<nav>
    <ul class="pagination">
        <li v-if="pagination.current_page > 1">

            <a href="#" onclick="toTheTop()" aria-label="Previous"
               @click.prevent="changePage(pagination.current_page - 1)">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li v-for="page in pagesNumber"
            v-bind:class="[ page == isActived ? 'active' : '']">
            <a href="#" onclick="toTheTop()"
               @click.prevent="changePage(page)">@{{ page }}</a>
        </li>
        <li v-if="pagination.current_page < pagination.last_page">
            <a href="#" onclick="toTheTop()" aria-label="Next"
               @click.prevent="changePage(pagination.current_page + 1)">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>