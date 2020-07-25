    export default {
            retrieveToken(state,data){
                state.token=data
            },
            destroyToken(state){
                state.token=null;
            },  
            getPost(state,data){
                state.posts=data;
            },
            getById(state,data){
                state.post=data;
            },
            deletePost(state,data){
                data.map(id=>{
                    let index=state.posts.findIndex(item=>item.id == id)
                    state.posts.splice(index,1)

                })
            },
            uploadProgress(state,data){
                state.uploadProgress=data
            },
            loading(state,data){
                state.loading=data
            },
    }