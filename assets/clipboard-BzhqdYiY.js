const e=async r=>{try{return await navigator.clipboard.writeText(r),!0}catch(t){return console.error("Failed to copy text: ",t),!1}};export{e as c};
