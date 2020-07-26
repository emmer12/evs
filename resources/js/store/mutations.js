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
                    let index=state.evsFeed.findIndex(item=>item.id == id)
                    state.evsFeed.splice(index,1)

                })
            },
            uploadProgress(state,data){
                state.uploadProgress=data
            },
            loading(state,data){
                state.loading=data
            },
            getEvsFeed(state,data){
                state.evsFeed=data
            }
    }