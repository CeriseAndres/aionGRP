
<template>
  <div>
  <form>
    <div class="form-group">

      <label>Upload Image</label>
      <div class="input-group">
          <span class="input-group-btn">
              <span class="btn btn-default btn-file">
                  Browse… <input type="file" id="imgInp" v-on:change="onImageChange">
              </span>
          </span>
          <input type="text" class="form-control" v-model="nameImg">
      </div>
      <img id='img-upload'/>

      <label for="formInput">HOUSE</label>
      <input type="text" class="form-control" v-model="house" name="house">
      <label for="formControlTextarea">DESCRIPTION</label>
      <textarea class="form-control" v-model="description" name="description" rows="3"></textarea>
      <a v-on:click="modify" class="btn btn-lg btn-block">accept</a>
    </div>
  </form>
<form enctype="multipart/form-data"  @submit="test" id="fupForm" >
  <div class="form-group">
        <label for="file">File</label>
        <input type="file" class="form-control" id="file" v-on:change="onImageChange" name="file" required />
        <input type="submit" name="submit"  class="btn btn-danger submitBtn" value="SAVE"/>
    </div>
</form>
</div>
</template>

<script>
import $ from 'jquery'
import axios from 'axios'
export default {
  name: 'ModifCharac',
  data: function() {
    return {
      description:"",
      house: "",
      tab:[],
      api:"",
      image:"",
      nameImg:"",
      filee:"",
    }
  },
  methods: {
      modify: function() {
        var self=this;

        var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url="http://localhost/aionGRP/api.php?w=personnage&name="+name+"&api="+self.api+"&v=modify";
          var arr ={description: self.description, house: self.house, id:self.$route.params.id};
          $.ajax({
              url: url,
              type: 'POST',
              data: JSON.stringify(arr),
              contentType: 'application/json;',
              dataType: 'json',
              async: true,
              success: function(msg) {
                console.log('ok');

              }
          });
          self.$router.push({name: 'mycharacters'});
        });
      },
      test: function (e) {
        var self=this;
        console.log('etape1');
         e.preventDefault();
         let formData = new FormData();
         formData.append('image', self.image);
         const config = {

    headers: { 'content-type': 'multipart/form-data' }

}

         axios.post('http://localhost/aionGRP/test.php', formData, config)
         .then(function (response) {
               console.log('marche'+response.data.success);
             })
            .catch(function (error) {
                   console.log('erreur'+error);
                 });

      },
      show: function(){
        var self=this;
        var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url="http://localhost/aionGRP/api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeOne&id="+self.$route.params.id;
          $.getJSON(url, function (data) {
              self.tab=data;
              self.house=self.tab.house;
              self.description=self.tab.description;
              console.log(data);
          });

        });
      },
      onImageChange: function(e){
        console.log(e.target.files[0]);
        this.image = e.target.files[0];
      },
    },
   mounted() {
     this.show()
   }
}
</script>
<style>
body{
    overflow-wrap: break-word;
  }
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
</style>
</script>
