<template>
  <form>
    <div class="form-group">
      <label for="formInput">TITLE</label>
      <input type="text" class="form-control" v-model="title" name="title"><br>
      <label for="formControlTextarea">CONTENT</label>
      <textarea class="form-control" v-model="content" name="content" rows="3"></textarea>
      <a v-on:click="addpost" class="btn btn-lg btn-block">accept</a>
    </div>
  </form>
</template>

<script>
import $ from 'jquery'
import axios from 'axios'
export default {
  name: 'BlogCharac',
  data: function() {
    return {
      tab:[],
      api:"",
      title: null,
      content: null

    }
  },

  methods: {
      addpost (){
        var self=this;

          self.api=api;
          url=burl+'api.php?w=blog&v=addBlog&name='+name+'&api='+self.api+'&id='+self.$route.params.id;
          axios.post(url, {
            title: self.title,
            content: self.content
          })
          .then((response) => {
            console.log('marche'+response.data.success);
            alert('posted');
          })
          .catch(function (error) {
                 console.log('erreur'+error);

               });

      },

   }

}
</script>
