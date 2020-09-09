<template>

<v-card>
    <v-card-title>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
  <v-data-table
    :headers="headers"
    :items="posts"
    :search="search"
    sort-by="created_at"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>My Posts</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="950px">
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on"
            >New Post</v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container fluid>
                <v-row>
                  <v-col cols="12">
                    <v-text-field v-model="editedItem.title" label="Title"></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-file-input show-size counter :v-model="editedItem.photo_url" label="Thumbnail"></v-file-input>
                  </v-col>
                  <v-col cols="12" v-if="!loading">
                      <editor-component></editor-component>
                  </v-col>
                </v-row>
                
              </v-container>
              
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
      <v-icon
        small
        @click="deleteItem(item)"
      >
        mdi-delete
      </v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize">Reset</v-btn>
    </template>
  </v-data-table>
</v-card>

</template>

<script>
import axios from 'axios';
import EditorComponent from './EditorComponent.vue';

  export default {

    data: () => ({
      dialog: false,
      search:'',
      loading: false,
      user : {},
      headers: [
        {
          text: 'Title',
          align: 'start',
          sortable: false,
          value: 'title',
        },
        { text: 'Created at', value: 'created_at' },
        { text: 'Updated_at', value: 'updated_at' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      posts: [],
      editedIndex: -1,
      editedItem: {
        id : null,
        title: '',
        body : '',
        photo_id : null,
        photo_url : null,
        user_id : null,
        created_at : null,
        updated_at : null
      },
      defaultItem: {
        id : null,
        title: '',
        body : '',
        photo_id : null,
        photo_url : null,
        user_id : null,
        created_at : null,
        updated_at : null
      },
    }),
    
    props: ['slug'],

    components: {
       EditorComponent
    },

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Post' : 'Edit Post'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    created () {
      this.initialize();
    },

    methods: {
      initialize () {
    //     let res = await axios.get(`/api/${this.slug}/posts`);
    //  // let res = await axios.get('api/posts');
    //     this.posts = res.data.data;
        this.loading = true;
        axios.get(`/api/${this.slug}/posts`).then( res => {
           this.posts = res.data.data;
           this.loading = false;
        });
      },

      editItem (item) {
        this.editedIndex = this.posts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        const index = this.posts.indexOf(item)
        confirm('Are you sure you want to delete this item?') && this.posts.splice(index, 1)
      },

      close () {
        this.dialog = false
        this.$nextTick(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        })
      },

      save () {
        if (this.editedIndex > -1) {
          axios.post('api/posts',this.editedItem)
          .then(res => console.log(res.data))
          .catch(err => console.log(err));

          // Object.assign(this.posts[this.editedIndex], this.editedItem)
        } else {
          
          this.posts.push(this.editedItem)
        }
        this.close()
      },
    },
  }
</script>