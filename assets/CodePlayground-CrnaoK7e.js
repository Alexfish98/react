import{d as u,r,j as e,k as n}from"./index-DCjzbjsf.js";import{P as p}from"./play-C34xKSmD.js";/**
 * @license lucide-react v0.574.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */const g=[["rect",{width:"18",height:"18",x:"3",y:"3",rx:"2",key:"afitv7"}],["path",{d:"M3 9h18",key:"1pudct"}],["path",{d:"M9 21V9",key:"1oto5p"}]],f=u("panels-top-left",g),y=()=>{const[t,c]=r.useState(`<h1>Hello World</h1>
<button id="btn">Click Me</button>`),[a,d]=r.useState(`body { font-family: sans-serif; padding: 20px; }
h1 { color: #0ea5e9; }
button { padding: 10px 20px; background: #333; color: white; border: none; border-radius: 5px; cursor: pointer; }`),[l,i]=r.useState(`document.getElementById("btn").addEventListener("click", () => {
  alert("Button Clicked!");
});`),[x,m]=r.useState(""),o=()=>{const s=`
      <html>
        <head>
          <style>${a}</style>
        </head>
        <body>
          ${t}
          <script>${l}<\/script>
        </body>
      </html>
    `;m(s)};return r.useEffect(()=>{const s=setTimeout(o,1e3);return()=>clearTimeout(s)},[t,a,l]),e.jsxs("div",{className:"space-y-4 h-[calc(100vh-200px)] min-h-[600px] flex flex-col",children:[e.jsxs("div",{className:"grid grid-cols-1 lg:grid-cols-3 gap-4 flex-1 min-h-0",children:[e.jsxs("div",{className:"flex flex-col gap-2",children:[e.jsxs("label",{className:"text-xs font-bold uppercase text-gray-500 flex items-center",children:[e.jsx(n,{size:14,className:"mr-1"})," HTML"]}),e.jsx("textarea",{value:t,onChange:s=>c(s.target.value),className:"flex-1 p-3 rounded-lg border dark:bg-gray-800 dark:border-gray-700 font-mono text-sm resize-none focus:ring-2 focus:ring-primary-500 outline-none",placeholder:"<!-- HTML here -->"})]}),e.jsxs("div",{className:"flex flex-col gap-2",children:[e.jsxs("label",{className:"text-xs font-bold uppercase text-gray-500 flex items-center",children:[e.jsx(f,{size:14,className:"mr-1"})," CSS"]}),e.jsx("textarea",{value:a,onChange:s=>d(s.target.value),className:"flex-1 p-3 rounded-lg border dark:bg-gray-800 dark:border-gray-700 font-mono text-sm resize-none focus:ring-2 focus:ring-primary-500 outline-none",placeholder:"/* CSS here */"})]}),e.jsxs("div",{className:"flex flex-col gap-2",children:[e.jsxs("label",{className:"text-xs font-bold uppercase text-gray-500 flex items-center",children:[e.jsx(n,{size:14,className:"mr-1"})," JS"]}),e.jsx("textarea",{value:l,onChange:s=>i(s.target.value),className:"flex-1 p-3 rounded-lg border dark:bg-gray-800 dark:border-gray-700 font-mono text-sm resize-none focus:ring-2 focus:ring-primary-500 outline-none",placeholder:"// JavaScript here"})]})]}),e.jsxs("div",{className:"flex-1 flex flex-col min-h-[300px] bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-xl overflow-hidden shadow-sm",children:[e.jsxs("div",{className:"bg-gray-100 dark:bg-gray-900 px-4 py-2 border-b dark:border-gray-700 flex justify-between items-center",children:[e.jsx("span",{className:"text-xs font-bold uppercase text-gray-500",children:"Preview"}),e.jsxs("button",{onClick:o,className:"flex items-center text-xs font-bold text-primary-600 hover:text-primary-700",children:[e.jsx(p,{size:14,className:"mr-1"})," Run Manual"]})]}),e.jsx("iframe",{srcDoc:x,title:"output",sandbox:"allow-scripts",className:"w-full h-full bg-white"})]})]})};export{y as default};
