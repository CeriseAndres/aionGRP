<template>
  <div class="container-fluid">
	  <div class="row" style="justify-content: center;">
		  <div class="col-md-10">
        <h1>EDIT</h1>
        <form>
          <div class="form-group">
            <label for="formInput">TITLE</label>
            <input type="text" class="form-control" v-model="title" name="title"><br>
            <label for="formControlTextarea">CONTENT</label>
            <textarea class="form-control" v-model="content" name="content" rows="8"></textarea>
            <a v-on:click="editpost" class="btn btn-block">ACCEPT</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
import axios from 'axios'
export default {
  name: 'BlogEdit',
  data: function() {
    return {
      tab:[],
      api:"",
      title: "",
      content: ""

    }
  },

  methods: {
      show: function(){
        var self=this;
          self.api=api;
          var url= burl+"api.php?w=blog&name="+name+"&api="+self.api+"&v=selectOne&idblog="+self.$route.params.id;
          $.getJSON(url, function (data) {
              self.tab=data;
              self.title=self.tab.title;
              self.content=self.tab.content;
              //console.log(data);
          });
      },
      editpost (){
        var self=this;

        self.api=api;
        var url=burl+'api.php?w=blog&v=modifyBlog&name='+name+'&api='+self.api+'&idblog='+self.$route.params.id;
        axios.post(url, {
          title: self.title,
          data: self.content
        })
        .then((response) => {
          self.$router.go(-1);
        })
        .catch(function (error) {
          //console.log('erreur'+error);
        });

      },

   },
   mounted() {
     this.show()
   }

}
</script>

<style scoped>
.form-group{
  display: flex;
  flex-direction: column;
}
h1{
  text-align: center;
}
.btn{
  color: #ffffff;
  background: rgba(154,83,254,0.5);
  border-radius:3px;
}
.btn:hover{
  color: #ffffff;
  text-decoration: none;
  background: rgba(154,83,254,1);
}
</style>
