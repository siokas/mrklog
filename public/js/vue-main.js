var content = $('#content').val()
var tagName = $('#tagName').val()
var userName = $('#userName').val()
var dateFormat = $('#dateFormat').val()

new Vue({
  el: '#main-app',

  ready: function () {
    if (content == 'user') {
      this.to_fetch = 'user'
      this.user_name = userName
    }
    if (content == 'tag') {
      this.to_fetch = 'tag'
      this.tag_name = tagName
    }
    if (content == 'popular') {
      this.to_fetch = 'popular'
    }

    this.fetchPosts(this.pagination.current_page)
  },

  data: {
    list: [],
    post_title: '',
    author: '',
    keywords: '',
    tags: [],
    ids: [],
    pagination: {
      total: 0,
      per_page: 5,
      from: 1,
      to: 0,
      current_page: 1
    },
    offset: 5,
    to_fetch: 'post',
    tag_name: '',
    user_name: ''
  },

  filters: {
    marked: marked,
    moment: function (date) {
      return moment(date).format(dateFormat)
    }
  },

  methods: {
    moment: function () {
      return moment()
    },

    fetchPosts: function (page) {
      if (page == 0) {
        page = 1
        this.to_fetch = 'post'
      }
      var data = {page: page}

      if (this.to_fetch == 'post') {
        this.$http.get('/api/withPagination/posts', data).then(function (response) {
          this.$set('list', response.data.data.data)
          this.$set('pagination', response.data.pagination)
        }.bind(this), function (response) {
          // error callback
        })
      }
      if (this.to_fetch == 'tag') {
        this.$http.get('/api/withPagination/tag/' + this.tag_name, data).then(function (response) {
          this.$set('list', response.data.data.data)
          this.$set('pagination', response.data.pagination)
        }.bind(this), function (response) {
          // error callback
        })
      }
      if (this.to_fetch == 'user') {
        this.$http.get('/api/withPagination/user/' + this.user_name, data).then(function (response) {
          this.$set('list', response.data.data.data)
          this.$set('pagination', response.data.pagination)
        }.bind(this), function (response) {
          // error callback
        })
      }
      if (this.to_fetch == 'popular') {
        this.$http.get('/api/popular', data).then(function (response) {
          console.log(response.data)
          this.$set('list', response.data)
        // this.$set('pagination', response.data.pagination)
        }.bind(this), function (response) {
          // error callback
        })
      }
    },

    to_tag: function (event) {
      var target = event.target || event.srcElement
      this.to_fetch = 'tag'
      this.tag_name = target.innerHTML
      this.fetchPosts(1)
    },

    to_user: function (event) {
      var target = event.target || event.srcElement
      this.to_fetch = 'user'
      this.user_name = target.innerHTML
      this.fetchPosts(1)
    },

    changePage: function (page) {
      this.pagination.current_page = page
      this.fetchPosts(page)
    }
  },

  computed: {
    isActived: function () {
      return this.pagination.current_page
    },
    pagesNumber: function () {
      if (!this.pagination.to) {
        return []
      }
      var from = this.pagination.current_page - this.offset
      if (from < 1) {
        from = 1
      }
      var to = from + (this.offset * 2)
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page
      }
      var pagesArray = []
      while (from <= to) {
        pagesArray.push(from)
        from++
      }
      return pagesArray
    }
  }

})
