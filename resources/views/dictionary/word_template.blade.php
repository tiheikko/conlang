<tr id="word_{{ $word->id }}">
    <td>
        {{ $word->word }}
    </td>
    <td>
        {{ $word->definition }}
    </td>
    @auth
        <td>
            <button type="button" class="btn btn-primary edit_word_btn"
                    data-word="{{ $word->word }}"
                    data-definition="{{ $word->definition }}"
                    data-word-id="{{ $word->id }}"
                    data-bs-toggle="modal"
                    data-bs-target="#dictionary_modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-edit-2">
                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                </svg>
            </button>
        </td>
        <td>
            <button type="button" class="btn btn-danger delete_word_btn" data-word-id="{{ $word->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-trash-2">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
            </button>
        </td>
    @endauth
</tr>
