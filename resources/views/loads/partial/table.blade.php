<div class="table-responsive">
    <table class="table table-sm text-center table-striped mb-0">
        <colgroup>
            <col width="7%">
            <col width="31%">
            <col width="31%">
            <col width="31%">
        </colgroup>

        <thead>
            <tr>
                <th><input type="checkbox" @change="toggleChecks" :checked="parent"></th>
                <th>클리어 횟수</th>
                <th>코드</th>
                <th>수정</th>
            </tr>
        </thead>

        <tbody>
            <tr is="set-load-component" v-for="item in items" :item="item" :key="item.id"></tr>

            <tr v-if="! items.length" class="empty">
                <td>코드를 등록해주세요.</td>
            </tr>
        </tbody>
    </table>
</div>
