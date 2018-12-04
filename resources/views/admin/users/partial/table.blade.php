<div class="table-responsive">
    <table class="table table-sm text-center table-striped mb-0">
        <colgroup>
            <col width="7%">
            <col width="13%">
            <col>
            <col width="20%">
            <col width="9%">
            <col width="7%">
            <col width="9%">
        </colgroup>

        <thead>
            <tr>
                <th><input type="checkbox" @change="toggleChecks" :checked="parent"></th>
                <th>이름</th>
                <th>이메일</th>
                <th>연락처</th>
                <th>방문수</th>
                <th>이메일인증</th>
                <th>가입일</th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="user in items">
                <td><input type="checkbox" :value="user.id" @change="toggleCheck"></td>
                <td><a :href="`/admin/users/${user.id}/edit`" v-text="user.name"></a></td>
                <td v-text="user.email"></td>
                <td v-text="user.tel"></td>
                <td v-text="user.visits"></td>
                <td>@{{ user.email_verified_at | diffForHumans }}</td>
                <td>@{{ user.created_at | diffForHumans }}</td>
            </tr>

            <tr v-if="! items.length" class="empty">
                <td>
                    회원이 없습니다.
                </td>
            </tr>
        </tbody>
    </table>
</div>
