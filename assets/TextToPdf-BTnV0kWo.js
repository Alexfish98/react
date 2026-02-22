import{r as s,j as t,F as i}from"./index-DCjzbjsf.js";const c=()=>{const[r,o]=s.useState(""),[n,a]=s.useState(!1),l=async()=>{if(r){a(!0);try{const e=window.open("","_blank");e&&(e.document.write(`
          <html>
            <head>
              <title>Text to PDF</title>
              <style>
                body { font-family: monospace; white-space: pre-wrap; padding: 20px; }
              </style>
            </head>
            <body>${r}</body>
          </html>
        `),e.document.close(),e.focus(),e.print(),e.close())}catch(e){console.error("Error generating PDF:",e),alert("Failed to generate PDF.")}finally{a(!1)}}};return t.jsxs("div",{className:"space-y-6",children:[t.jsxs("div",{className:"space-y-2",children:[t.jsx("label",{className:"block text-sm font-medium text-gray-700 dark:text-gray-300",children:"Enter Text"}),t.jsx("textarea",{value:r,onChange:e=>o(e.target.value),className:"w-full h-96 p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 focus:ring-2 focus:ring-primary-500 outline-none resize-none font-mono text-sm",placeholder:"Type or paste your text here..."})]}),t.jsx("div",{className:"flex justify-end",children:t.jsxs("button",{onClick:l,disabled:!r||n,className:"flex items-center space-x-2 px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-xl font-bold transition-all active:scale-95 shadow-lg shadow-primary-600/20 disabled:opacity-50 disabled:cursor-not-allowed",children:[t.jsx(i,{size:20}),t.jsx("span",{children:"Print / Save as PDF"})]})})]})};export{c as default};
