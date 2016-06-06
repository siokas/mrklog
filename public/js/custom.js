function toTheTop () {
  $('html,body').scrollTop(0)
}

$('#article').markdown({
  additionalButtons: [
    [{
      name: 'groupCustom',
      data: [{
        name: 'cmdTitle',
        toggle: true, // this param only take effect if you load bootstrap.js
        title: 'Title',
        icon: 'glyphicon glyphicon-text-size',
        callback: function (e) {
          // Replace selection with some drinks
          var chunk, cursor,
            selected = e.getSelection(), content = e.getContent(),

            // Give random drink
            chunk = '# Title'

          // transform selection and set the cursor into chunked text
          e.replaceSelection(chunk)
          cursor = selected.start

          // Set the cursor
          e.setSelection(cursor + 2, cursor + chunk.length)
        }
      },
        {
          name: 'cmdAuthor',
          toggle: true, // this param only take effect if you load bootstrap.js
          title: 'Author',
          icon: 'glyphicon glyphicon-user',
          callback: function (e) {
            // Replace selection with some drinks
            var chunk, cursor,
              selected = e.getSelection(), content = e.getContent(),

              // Give random drink
              chunk = 'Author: your name'

            // transform selection and set the cursor into chunked text
            e.replaceSelection(chunk)
            cursor = selected.start

            // Set the cursor
            e.setSelection(cursor + 8, cursor + chunk.length)
          }
        }
      ]
    }]
  ]
})
