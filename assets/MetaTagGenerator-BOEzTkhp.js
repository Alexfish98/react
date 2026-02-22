import{r as o,j as e}from"./index-DCjzbjsf.js";const p=()=>{const[t,s]=o.useState(""),[a,n]=o.useState(""),[l,d]=o.useState(""),c=`
<!-- Primary Meta Tags -->
<title>${t}</title>
<meta name="title" content="${t}">
<meta name="description" content="${a}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="${l}">
<meta property="og:title" content="${t}">
<meta property="og:description" content="${a}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="${l}">
<meta property="twitter:title" content="${t}">
<meta property="twitter:description" content="${a}">
  `.trim();return e.jsxs("div",{className:"grid grid-cols-1 md:grid-cols-2 gap-6",children:[e.jsxs("div",{className:"space-y-4",children:[e.jsxs("div",{children:[e.jsx("label",{className:"block font-bold mb-1",children:"Site Title"}),e.jsx("input",{type:"text",className:"w-full p-2 border rounded dark:bg-gray-800 dark:border-gray-700",value:t,onChange:r=>s(r.target.value),placeholder:"My Awesome Site"})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block font-bold mb-1",children:"Description"}),e.jsx("textarea",{className:"w-full p-2 border rounded h-24 dark:bg-gray-800 dark:border-gray-700",value:a,onChange:r=>n(r.target.value),placeholder:"A short description..."})]}),e.jsxs("div",{children:[e.jsx("label",{className:"block font-bold mb-1",children:"URL"}),e.jsx("input",{type:"text",className:"w-full p-2 border rounded dark:bg-gray-800 dark:border-gray-700",value:l,onChange:r=>d(r.target.value),placeholder:"https://example.com"})]})]}),e.jsxs("div",{className:"relative",children:[e.jsx("label",{className:"block font-bold mb-2",children:"Generated HTML"}),e.jsx("textarea",{readOnly:!0,value:c,className:"w-full h-80 p-4 font-mono text-xs rounded-xl border dark:bg-gray-800 dark:border-gray-700"})]})]})};export{p as default};
