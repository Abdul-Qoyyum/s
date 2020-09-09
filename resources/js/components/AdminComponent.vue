<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
    >
      <v-list dense>
        <v-list-item link to="/">
          <v-list-item-action>
            <v-icon>mdi-view-dashboard</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Dashboard</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/settings">
          <v-list-item-action>
            <v-icon>mdi-podcast</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Podcast</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link :to="`/${slug}/posts`">
          <v-list-item-action>
            <v-icon>mdi-clipboard</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Posts</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/settings">
          <v-list-item-action>
            <v-icon>mdi-cogs</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Settings</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      clipped-left
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container
        class="fill-height"
        justify-center
        fluid
      >
       <!-- use router view here -->
       <router-view></router-view>

      </v-container>
    </v-main>

    <v-footer app>
      <span>&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    props: {
      slug : {
      type : String,
      required : true
      }
    },
    data: () => ({
      drawer: null,
    }),
    created () {
      this.$vuetify.theme.themes.light.primary = '#4caf50'
    },
  }
</script>