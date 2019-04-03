<template>
    <div class="container">
        <div class="row justify-content-center">
          <div v-for="player in players">
              <div class="col-md-8">
                  <div class="card">
                    <div class="card-header">
                      <h4>{{ player.name }} - {{ player.race }} - {{ player.player_class }}</h4>
                      <h6>{{ player.account_name }}</h6>
                    </div>

                    <div class="card-body">
                        <p>{{ player.gender }}</p>
                        <p>{{ player.exp }}</p>
                        <p>{{ player.creation_date }}</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        resource: null,
        data () {
          return {
            players: {}
          }
        },
        mounted() {
          this.resource = this.$resource('/players{/id}')
          this.resource.get().then((response) => {
            this.players = response.body
          })
          console.log('Component mounted.')
        }
    }
</script>
