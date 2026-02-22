import{r as d,j as e,J as y}from"./index-DCjzbjsf.js";import{c as b}from"./clipboard-BzhqdYiY.js";import{U as g}from"./upload-Bs_1B8hd.js";const N=()=>{const[l,c]=d.useState(""),[o,x]=d.useState(""),[p,m]=d.useState(!1),u=()=>{if(!l)return;const s=l.split(`
`).filter(t=>t.trim()!=="");if(s.length===0)return;let r=`<table class="table">
  <thead>
    <tr>
`;s[0].split(",").map(t=>t.trim()).forEach(t=>{r+=`      <th>${t}</th>
`}),r+=`    </tr>
  </thead>
  <tbody>
`;for(let t=1;t<s.length;t++){const i=s[t].split(",").map(a=>a.trim());r+=`    <tr>
`,i.forEach(a=>{r+=`      <td>${a}</td>
`}),r+=`    </tr>
`}r+=`  </tbody>
</table>`,x(r)},h=()=>{b(o),m(!0),setTimeout(()=>m(!1),2e3)},f=s=>{var n;const r=(n=s.target.files)==null?void 0:n[0];if(r){const t=new FileReader;t.onload=i=>{var a;c((a=i.target)==null?void 0:a.result)},t.readAsText(r)}};return e.jsxs("div",{className:"grid lg:grid-cols-2 gap-8",children:[e.jsxs("div",{className:"space-y-4",children:[e.jsxs("div",{className:"flex justify-between items-center",children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700 dark:text-gray-300",children:"CSV Input"}),e.jsxs("label",{className:"text-xs text-primary-600 hover:text-primary-700 cursor-pointer flex items-center space-x-1",children:[e.jsx(g,{size:12}),e.jsx("span",{children:"Upload File"}),e.jsx("input",{type:"file",accept:".csv",onChange:f,className:"hidden"})]})]}),e.jsx("textarea",{value:l,onChange:s=>c(s.target.value),className:"w-full h-96 p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 focus:ring-2 focus:ring-primary-500 outline-none resize-none font-mono text-xs",placeholder:`Name,Age,City
John,30,New York
Jane,25,London`}),e.jsxs("button",{onClick:u,className:"w-full py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-xl font-bold transition-colors flex items-center justify-center space-x-2",children:[e.jsx(y,{size:18}),e.jsx("span",{children:"Convert to HTML Table"})]})]}),e.jsxs("div",{className:"space-y-4",children:[e.jsxs("div",{className:"flex justify-between items-center",children:[e.jsx("label",{className:"block text-sm font-medium text-gray-700 dark:text-gray-300",children:"HTML Output"}),e.jsx("button",{onClick:h,disabled:!o,className:"text-xs text-primary-600 hover:text-primary-700 font-medium disabled:opacity-50",children:p?"Copied!":"Copy Code"})]}),e.jsx("textarea",{readOnly:!0,value:o,className:"w-full h-96 p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 focus:ring-2 focus:ring-primary-500 outline-none resize-none font-mono text-xs",placeholder:"HTML output will appear here..."})]})]})};export{N as default};
