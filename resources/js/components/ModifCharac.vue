
<template>
  <div>

    <form enctype="multipart/form-data"  @submit="test" id="fupForm" >
      <div class="form-group">
        <div class="input-group">
            <label for="file">UPLOAD IMAGE</label>
            <input type="file" class="form-control" id="file" v-on:change="onImageChange" name="file" required />
            <input type="submit" name="submit"  class="btn submitBtn" value="SAVE" style="color: #ffffff"/><br>
        </div>
        <img class="img-thumbnail rounded mx-auto d-block" v-if="image" v-bind:src="imagePreview" v-show="showPreview"/>
      </div>
    </form>

    <form>
      <div class="form-group">
        <label for="formInput">HOUSE</label>
        <input type="text" class="form-control" v-model="house" name="house"><br>
        <label for="formInput">Size</label>
        <input type="text" class="form-control" v-model="size" name="house"><br>
        <label for="formInput">Weight</label>
        <input type="text" class="form-control" v-model="weight" name="house"><br>
        <label for="formInput">Race</label>
        <input type="text" class="form-control" v-model="racerp" name="house"><br>
        <label for="formInput">Age</label>
        <input type="text" class="form-control" v-model="age" name="house"><br>
        <label for="formControlTextarea">DESCRIPTION</label>
        <textarea class="form-control" v-model="description" name="description" rows="3"></textarea>
        <a v-on:click="modify" class="btn editBtn">ACCEPT</a>
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
      size:"",
      weight:"",
      racerp:"",
      age:"",
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
          var data={
            description: self.description,
            house: self.house,
            size: self.size,
            weight: self.weight,
            racerp: self.racerp,
            age: self.age,

          };
          var arr ={data: data, id:self.$route.params.id};
          $.ajax({
              url: url,
              type: 'POST',
              data: JSON.stringify(arr),
              contentType: 'application/json;',
              dataType: 'json',
              async: true,
              success: function(msg) {
                alert('change accepted');
              }
          });
          self.$router.push({name: 'mycharacters'});

      },
      test: function (e) {
        var self=this;
         e.preventDefault();
         let formData = new FormData();
         formData.append('image', self.image);
         const config = {
           headers: { 'content-type': 'multipart/form-data' }
         }
          let url=burl+"api.php?w=blog&v=imgsend&name="+name+"&api="+self.api+'&id='+self.$route.params.id;
         axios.post(url, formData, config)
         .then(function (response) {
             alert('image uploaded');
             self.emptyImage();
          })
          .catch(function (error) {
            //console.log('erreur'+error);
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
              self.age=self.tab.age;
              self.racerp=self.tab.racerp;
              self.size=self.tab.size;
              self.weight=self.tab.weight;
              //console.log(data);
          });
      },
      onImageChange: function(e){
        var self=this;
        //console.log(e.target.files[0]);
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

<style scoped>
  body{
      overflow-wrap: break-word;
  }
  .form-control{
    padding: 1px;
    width: 100% !important;
  }
  .input-group > .form-control, .input-group > .form-control-plaintext {
    width: 100%;
    height: 100%;
    pointer: cursor;
  }
  .input-group > .form-control:not(:last-child) {
    border-radius: 4px;
  }
  .btn{
    background: rgba(154,83,254,0.5);
    border-radius:3px;
    width: 80px;
    color: #ffffff !important;
  }
  .btn:hover{
    text-decoration: none;
    background: rgba(154,83,254,1);
  }
</style>
