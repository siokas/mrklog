var post_id = $('#id').val()

document.getElementById('sss').innerHTML = marked(s)

new Vue({
  el: '#article-app',

  ready: function () {
    this.fetchPost()
    this.article
  },

  data: {
    list: [],
    id: post_id,
    post_title: '',
    author: '',
    tags: [],
    article: postArticle
  },

  filters: {
    marked: marked
  },

  methods: {
    fetchPost: function () {
      this.$http({url: '/api/post/' + post_id, method: 'GET'}).then(function (response) {
        this.list = response.data
      }.bind(this), function (response) {
        // error callback
      })
    }

  },

  computed: {

  }

})
