
function openModal(comments, post, user, tags, likes, liked){
    
    if(document.querySelector('#modal-content')){
        let postLink = `/${user.username}/post/${post.id}`;
        let modalPost = document.querySelector('#modal-content');
        let postImageUrl = '/uploads/' + post.image;
        let userImageUrl = user.image ? '/profiles/' + user.image : '/img/user-img.svg';
        let tagsHtml = showTags(tags);
        let fecha = moment(post.created_at).fromNow();
        modalPost.innerHTML = `
        <div class="w-full md:w-1/2 h-full flex items-center justify-center border-r border-r-gray-800">
             <img class="w-full h-auto" src="${postImageUrl}" alt="image post">
         </div>
         <div class="w-full md:w-1/2 h-full pt-7 pb-7 md:pt-5 md:pb-0 md:overflow-hidden relative bg-[#070A0F]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-1.5 px-5">
                    <div class="h-10 w-10 rounded-full overflow-hidden">
                        <img class="h-full w-full object-cover" src="${userImageUrl}" alt="Rounded avatar">
                    </div>
                    <div class="text-sm">
                        <p><span>${user.name}</p>
                        <p class="text-xs opacity-70"><span>@</span>${user.username}</p>
                    </div>
                </div>
                <a href="${postLink}" class="md:hidden mx-5 bg-gradient-to-br rounded-full from-blue-700 to-cyan-400 py-1.5 px-5 text-white text-xs font-semibold">
                    See more
                </a>
            </div>
           
                <div class="hidden md:block h-[250px] overflow-y-auto mt-5 p-comments w-full rounded-md bg-[#04070a]">
                    ${postComents(comments, postLink)}
                </div>
                <div class="hidden md:block w-full rounded-md mt-5 px-5 max-h-[70px] overflow-y-auto">
                    <div class="flex items-center justify-between mb-1 gap-5">
                        <h2 class="text-sm font-bold">${post.title ? post.title : '☆*.°• hello •°.*☆' }</h2>
                        <p class="text-[10px] opacity-70">${fecha}</p>
                    </div>
                    <p class="text-xs opacity-70">${post.description ? post.description : '' }</p>
                </div>
    
                <div class="hidden md:flex items-center gap-2 z-30 mt-3 px-5">
                <a href="${postLink}" class="bg-gradient-to-br rounded-full from-blue-700 to-cyan-400 py-1.5 px-5 text-white text-xs font-semibold">
                    See more
                </a>
                </div>
                    
                    <div class="hidden items-center gap-1 text-cyan-600 text-[11px] mt-2 px-5">
                        ${tagsHtml}
                    </div>
                   
                <div class="hidden md:flex md:absolute mt-5 md:mt-0 md:bottom-0 md:left-0 w-full bg-[#04070a] pt-5 md:pt-3 pb-10 md:pb-3 px-5 items-center gap-5 justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 -mt-3 fill-current" viewBox="0 0 24 24"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm-5 10.5A1.5 1.5 0 0 1 9.5 14c-.086 0-.168-.011-.25-.025-.083.01-.164.025-.25.025a2 2 0 1 1 2-2c0 .085-.015.167-.025.25.013.082.025.164.025.25zm4 1.5c-.086 0-.167-.015-.25-.025a1.471 1.471 0 0 1-.25.025 1.5 1.5 0 0 1-1.5-1.5c0-.085.012-.168.025-.25-.01-.083-.025-.164-.025-.25a2 2 0 1 1 2 2z"></path></svg>
                    <form action="" class="w-full m-0 p-0">
                        <textarea name="description" placeholder="Add a coment..." class="resize-none p-1 h-11 w-full focus:outline-none border-none bg-transparent"></textarea>
                    </form>
                    <a href="${postLink}" class="bg-gradient-to-br rounded-full from-blue-700 to-cyan-400 py-1.5 w-[93px] text-center text-white text-[10px] font-semibold">
                        See more
                    </a>
                </div>
               
            </div>
        </div>
        `

    }
}


function showTags(tags){
    let tagsHtml = '';
    if(tags){
        tags.forEach(tag => {
            tagsHtml += '<span>#' + tag.name + '</span>';
        });
    }
    return tagsHtml; 
}

function postComents(comments, postLink){
    let liComment = '';
    if(comments.length > 0){
        comments.reverse();
        comments.forEach(comment => {
            let userImageUrl = '/img/default-user.png';
            let fecha = moment(comment.created_at).fromNow();

            liComment += `
            <li class="mb-10 m-li">
                <span class="absolute flex items-center justify-center rounded-full w-6 h-6 bg-black overflow-hidden -left-3 ring-8 ring-gray-500 ">
                <a href="${postLink}">
                    <img class="shadow-lg w-full h-full object-cover" src="${userImageUrl}" alt="profile image"/>
                </a>    
                </span>
                <div class="p-4 rounded-lg shadow-sm bg-gray-800">
                    <div class="items-center justify-between mb-3 sm:flex">
                        <time class="mb-1 text-xs font-normal sm:order-last sm:mb-0">${fecha}</time>
                        <a href="${postLink}" class="text-xs font-normal text-gray-200">
                            <p>Member of Neonet</p>
                        </a>
                    </div>
                    <div class="p-3 text-xs font-normal text-gray-200 rounded-lg bg-gray-500">${comment.comment}</div>
                </div>
            </li>
            `
        })
        let htmlComents = `
        <ol class="relative border-l border-gray-500">                  
            ${liComment}
        </ol>
            `
        return htmlComents; 
    }

    return 'No comments yet, start a conversation';

}


