<template>
    <div id="app">
        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    // import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';
    import CKEditor from '@ckeditor/ckeditor5-vue';


    export default {
        name : 'editor-component',
        data : () => ({
                editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {
                    // The configuration of the editor.
                    // plugins: [ CKFinder ],
                    // toolbar: ["ckfinder", "imageUpload"],
                    ckfinder: {
                    // // Feature configuration.
                    // uploadUrl: '/ckfinder/connector?command=QuickUpload&type=Files&responseType=json',
                    uploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                    }
                }
            }),
        components : {
            ckeditor : CKEditor.component
        }
    }
</script>