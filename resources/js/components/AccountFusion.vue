<template>
<div>
<h3>My characters liked</h3>
<p>There is the list of characters imported here</p>
    <div v-for="account in players">
    <ul v-for="player in account">
        <li>{{player.name}}</li>
    </ul>
    </div>

    <div>
        <p>If you want import or update some character ty to login here with youre aion GRP account</p>
        <input type="text" v-model="aionname">
        <input type="password" v-model="aionpass">
        <input type="submit" v-on:click="link">
    </div>

</div>


</template>

<script>
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
            var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
            $.getJSON(urlapi, function (data) {
                self.api=data;
                var url="http://localhost/aionGRP/api.php?w=personnage&name="+name+"&api="+self.api+"&v=takeAcc";
                $.getJSON(url, function (data) {
                    self.tab=data;
                    for (var i=0; i<self.tab.length;i++){
                     var url="http://localhost/aionGRP/api.php?w=getAcc&name="+name+"&api="+self.api+"&id="+self.tab[i][0];
                     console.log(url);
                     $.getJSON(url, function (data) {
                         self.players.push(data);
                     })
                    }

                })
            })
        },
        getplayers: function () {
            console.log(this.players);
        },
        link: function () {
            var self=this;
            var urlapi= "http://localhost/aionGRP/api.php?w=api&name="+name+"&password="+password;
            $.getJSON(urlapi, function (data) {
                var url="http://localhost/aionGRP/api.php?w=account&name="+name+"&api="+self.api;
                var arr={user: self.aionname,password: self.aionpass};
                console.log(arr);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: JSON.stringify(arr),
                    contentType: 'application/json;',
                    dataType: 'json',
                    async: true,
                    success: function(msg) {

                    }
                });
                console.log('ok');
                self.takeList();
            })
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

<style>

</style>
