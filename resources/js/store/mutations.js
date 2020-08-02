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
            getByCat(state,data){
                state.catFeed=data;
            },
            deletePost(state,data){
                data.map(id=>{
                    let index=state.evsFeed.findIndex(item=>item.id == id)
                    state.evsFeed.splice(index,1)

                })
            },
            deleteCat(state,data){
                    let index=state.category.findIndex(item=>item.id == data)
                    state.category.splice(index,1)
            },
            uploadProgress(state,data){
                state.uploadProgress=data
            },
            loading(state,data){
                state.loading=data
            },
            getEvsFeed(state,data){
                state.evsFeed=data
            },
            getCategory(state,data){
                state.category=data
            }
    }