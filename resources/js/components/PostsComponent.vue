<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3 mt-3" v-for="item in list">

                <div class="card-body">
                    <p class="card-text" v-text="item.title"></p>
                </div>
            </div>
            <infinite-loading @distance="1" @infinite="infiniteHandler">
                <div slot="no-more">No more results</div>
<!--                <div slot="spinner"></div>-->
                <div slot="no-results">No Results found!</div>
            </infinite-loading>
        </div>
    </div>
</template>

<script>

    export default {

            data()
            {
                return {
                    list: [],
                    page: 0
                }
            }
        ,
            methods: {
                infiniteHandler($state)
                {
                    this.page++
                    let url = '/api/posts?page=' + this.page

                    axios.get(url)
                        .then(response => {
                            console.log(response);
                            let posts = response.data.data

                            if (posts.length) {
                                this.list = this.list.concat(posts)
                                $state.loaded()
                            } else {
                                $state.complete()
                            }
                        })
                }
            }
    }
</script>
