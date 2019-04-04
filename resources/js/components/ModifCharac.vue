
<template>
  <form>
    <div class="form-group">
      <label for="formGroupExampleInput">HOUSE</label>
      <input type="text" class="form-control" v-model="house" name="house">
      <label for="exampleFormControlTextarea1">DESCRIPTION</label>
      <textarea class="form-control" v-model="description" name="description" rows="3"></textarea>
      <a v-on:click="modify" class="btn btn-lg btn-block">accept</a>
    </div>
  </form>
</template>

<script>
import $ from 'jquery'
export default {
  name: 'ModifCharac',
  data: function() {
    return {
      description:"",
      house: "",
      tab:[],
      api:""
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
      }
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
</style>
</script>
