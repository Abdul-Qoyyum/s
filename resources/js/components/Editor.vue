<template>
    <div id="app">
        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        data() {
            return {
                editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {
                    // The configuration of the editor.
                    plugins: [CKFinder],
                    toolbar: ["ckfinder", "imageUpload"],
                    ckfinder: {
                    // Feature configuration.
                    }
                }
            };
        }
    }
</script>