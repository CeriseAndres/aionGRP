<template>
  <div class="container">

  </div>
</template>

<script>
import $ from 'jquery'
export default {
  name: 'SearchCharacters',
  data: function() {
    return {
      tab:[],
      api:""
    }
  },
  methods: {
      search: function() {
        var self=this;
        var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
        $.getJSON(urlapi, function(data){
          self.api=data;
          var url="http://localhost/aionGRP/api.php?w=personnage&name="+name+"&api="+self.api+"&v=search&off=0";
          $.getJSON(url, function (data) {
              self.tab=data;
              console.log(data);
          });
        });
      }
    },
   mounted() {
     this.search()
   }

}
</script>

<style>

</style>
