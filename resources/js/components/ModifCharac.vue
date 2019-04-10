
<template>
  <div>

    <form enctype="multipart/form-data"  @submit="test" id="fupForm" >
      <div class="form-group">
        <div class="input-group">
            <label for="file">UPLOAD IMAGE</label>
            <input type="file" class="form-control" id="file" v-on:change="onImageChange" name="file" required />
            <input type="submit" name="submit"  class="btn submitBtn" value="SAVE"/><br>
        </div>
        <img class="img-thumbnail rounded mx-auto d-block" v-if="image" v-bind:src="imagePreview" v-show="showPreview"/>
      </div>
    </form>

    <form>
      <div class="form-group">
        <label for="formInput">HOUSE</label>
        <input type="text" class="form-control" v-model="house" name="house"><br>
        <label for="formControlTextarea">DESCRIPTION</label>
        <textarea class="form-control" v-model="description" name="description" rows="3"></textarea>
        <a v-on:click="modify" class="btn btn-lg btn-block">accept</a>
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
      showPreview: false,
      imagePreview: '',
      name:'',
    }
  },
  methods: {
      modify: function() {
        var self=this;

          self.api=api;
          var url= burl+"api.php?w=personnage&name="+name+"&api="+self.api+"&v=modify";
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
                alert('change accepted');
              }
          });
          self.$router.push({name: 'mycharacters'});

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
          let url=burl+"api.php?w=blog&v=imgsend&name="+name+"&api="+self.api+'&id='+self.$route.params.id;
         axios.post(url, formData, config)
         .then(function (response) {
               console.log('marche'+response.data.success);
               alert('image uploaded');
               self.emptyImage();
             })
            .catch(function (error) {
                   console.log('erreur'+error);
                   console.log(url);

                 });

      },
      show: function(){
        var self=this;

          self.api=api;
          var url= burl+"api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeOne&id="+self.$route.params.id;
          $.getJSON(url, function (data) {
              self.tab=data;
              self.house=self.tab.house;
              self.description=self.tab.description;
              console.log(data);
          });


      },
      onImageChange: function(e){
        var self=this;
        console.log(e.target.files[0]);
        self.image = e.target.files[0];
        let reader  = new FileReader();
        reader.addEventListener("load", function () {
          self.showPreview = true;
          self.imagePreview = reader.result;
        }.bind(self), false);
        reader.readAsDataURL( self.image );
      },
      emptyImage: function(){
        var self=this;
        self.image = "";
        let reader  = new FileReader();
        reader.addEventListener("load", function () {
          self.showPreview = false;
          self.imagePreview = reader.result;
        }.bind(self), false);
        reader.readAsDataURL( self.image );
      }
    },
   mounted() {
     this.show()
   }
}
</script>

<style>
  .form-control{
    padding: 1px;
  }
  .input-group > .form-control, .input-group > .form-control-plaintext {
    width: 100%;
    height: 100%;
    pointer: cursor;
  }
  .btn:hover {
    background-color: #8746ff;
    font-weight: bold;
  }
  .input-group > .form-control:not(:last-child) {
    border-radius: 4px;
  }
</style>
