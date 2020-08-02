export default {
    loggedIn(state){
        return state.token
    },
    post(state){
        return state.post
    },
    posts(state){
        return state.posts
    },
    serverError(state){
        return state.serverError;
    },
    loading(state){
        return state.loading
    }, 
    uploadProgress(state){
        return state.uploadProgress
    },
    evsFeeds(state){
        return state.evsFeed
    },
    evsCatFeeds(state){
        return state.catFeed
    },
    category(state){
        return state.category
    }
}