<script>
    import PaginatorComponent from './PaginatorComponent';
    import collection from '../../mixins/collection';
    import SetLoadComponent from '../../components/loads/SetLoadComponent';

    export default {
        props: ['endpoint'],

        components: { PaginatorComponent, SetLoadComponent },

        mixins: [ collection ],

        data() {
            return {
                parent: false,
                items: [],
                dataSet: false
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            toggleChecks(e) {
                this.parent = ! this.parent;

                $('td > input[type="checkbox"]').prop('checked', $(e.target).prop('checked'));
            },

            toggleCheck() {
                if (this.parent) this.parent = false;
            },

            fetch(page) {
                axios.get(this.url(page)).then(this.refresh);
            },

            url(page) {
                if (! page) {
                    let query = location.search.match(/page=(\d+)/);

                    page = query ? query[1] : 1;
                }

                return `${this.endpoint}?page=${page}`;
            },

            refresh({data}) {
                this.dataSet = data;
                this.items = data.data;

                window.scrollTo(0, 0);
            },

            deletes() {
                let checked = $('input[type="checkbox"]:checked'),
                    ids = $.map(checked, item => item.value);

                if (! checked.length) return toastr.error('삭제할 컬럼을 하나 이상 선택해주세요.');

                if (! confirm('정말 삭제하시겠습니가?\n삭제한 내용은 복구할 수 없습니다.')) return false;

                axios.put(`${location.pathname}/deletes`, { ids: ids }).then(() => this.fetch());
            }
        }
    }
</script>
