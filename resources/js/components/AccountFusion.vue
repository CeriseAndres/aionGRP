<template>
<div>
<h3>My characters liked</h3>
<p>There is the list of characters imported here</p>
    <div class="fusion" v-for="account in players">
    <ul v-for="player in account">
        <li>{{player.name}}</li>
    </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="row">
        <p>If you want import or update some character ty to login here with youre aion GRP account</p>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Account name</span>
            </div>
            <input type="text" v-model="aionname" class="form-control" id="basic-url" aria-describedby="basic-addon3">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon">Password</span>
            </div>
            <input type="password" v-model="aionpass" class="form-control" id="basic-url1" aria-describedby="basic-addon">
        </div>
            </div>
            </div>
            <button type="button" id="inputfusion" class="btn btnLogin" v-on:click="link">Login</button>
        </div>
    </div>

</div>


</template>

<script>
    import axios from 'axios';
import $ from 'jquery';
export default {
    name: 'AccountFusion',
    data: function (){
        return{
            api: "",
            idplayer:"",
            tab:[],
            players:[],
            aionname:"",
            aionpass:"",
        }
    },
    methods: {
        takeList: function () {
            var self=this;
                self.players=[];
                self.api=api;
                var url= burl+"api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeAcc";
                $.getJSON(url, function (data) {
                    self.tab=data;
                    for (var i=0; i<self.tab.length;i++){
                     var url= burl+"api.php?w=getAcc&name="+name+"&api="+self.api+"&id="+self.tab[i][0];
                     //console.log(url);
                     $.getJSON(url, function (data) {
                         self.players.push(data);
                     })
                    }

                })

        },
        getplayers: function () {
            //console.log(this.players);
        },
        link: function () {
          var self=this;

          var url= burl+"api.php?w=account&name="+name+"&api="+api;
          var arr={user: self.aionname,password: self.aionpass};

          axios.post(url, arr)
              .then(function (response) {
                  //console.log(response);
              })
              .catch(function (error) {
                  //console.log(error);
              });
          self.takeList();
        self.aionname="";
        self.aionpass="";
        }
    },
    mounted() {

        this.takeList();

    },
    watch: {
        '$route' (to, from) {
        }
    },
    beforeRouteUpdate (to, from, next) {
    },

}
</script>

<style scoped>
p{
    color:white;
}
.fusion{
    display: inline-flex;
}
.fusion>ul{
    display: inline-flex;
    list-style-type: none;
}
.form-control{
    width: auto !important;
}
#inputfusion{
    height: 100px;
    margin: auto;
    margin-top:3.8em;
}
#basic-addon{
  background: rgba(154,83,254,1);
  color: #ffffff !important;
  text-transform: uppercase;
  height: 38px;
}
#basic-addon3{
  background: rgba(154,83,254,1);
  color: #ffffff !important;
  text-transform: uppercase;
  height: 38px;
}
.btn{
  display: inline-block;
  text-decoration: none !important;
  background: rgba(154,83,254,0.5);
  border-radius:3px;
  width: 80px;
  color: #ffffff !important;
  text-transform: uppercase;
}
.btn:hover{
  text-decoration: none;
  background: rgba(154,83,254,1);
}
</style>
