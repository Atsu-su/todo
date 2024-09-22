"use strict"

function confirmDelete(id, todo) {
    if (confirm(`「 ${value} 」を削除しますか？`)) {
        document.getElementById(`form-delete-${id}`).submit();
    } else {
        console.log('削除をキャンセルしました')
    }
}

function confirmUpdate(id, value) {
    if (confirm(`「 ${value} 」を更新しますか？`))
        document.getElementById(`form-update-${id}`).submit();
    else
        console.log('更新をキャンセルしました')
}