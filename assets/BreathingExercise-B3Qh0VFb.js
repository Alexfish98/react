import{r as s,j as e,S as f}from"./index-DCjzbjsf.js";import{P as y}from"./play-C34xKSmD.js";const b=()=>{const[r,o]=s.useState(!1),[a,n]=s.useState("Inhale"),[x,l]=s.useState(4),[m,c]=s.useState(0);s.useEffect(()=>{let t;return r?t=setInterval(()=>{l(i=>i===1?(u(),h(d(a))):i-1)},1e3):(n("Inhale"),l(4),c(0)),()=>clearInterval(t)},[r,a]);const d=t=>t==="Inhale"?"Hold":t==="Hold"?"Exhale":"Inhale",h=t=>t==="Inhale"?4:t==="Hold"?7:8,u=()=>{const t=d(a);n(t),t==="Inhale"&&c(i=>i+1)};return e.jsxs("div",{className:"max-w-md mx-auto space-y-12 text-center",children:[e.jsxs("div",{className:"relative h-64 flex items-center justify-center",children:[e.jsx("div",{className:`
            absolute w-48 h-48 rounded-full border-4 border-primary-200 dark:border-primary-900
            transition-all duration-[4000ms] ease-linear
            ${r&&a==="Inhale"?"scale-125 bg-primary-100 dark:bg-primary-900/30":""}
            ${r&&a==="Hold"?"scale-125 bg-primary-200 dark:bg-primary-900/50":""}
            ${r&&a==="Exhale"?"scale-100 bg-transparent":""}
          `}),e.jsxs("div",{className:"relative z-10",children:[e.jsx("div",{className:"text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2",children:r?a:"Ready?"}),e.jsx("div",{className:"text-6xl font-bold text-gray-900 dark:text-white",children:x})]})]}),e.jsxs("div",{className:"space-y-4",children:[e.jsx("div",{className:"text-gray-500 font-medium",children:"Technique: 4-7-8 Breathing"}),e.jsxs("div",{className:"text-sm text-gray-400",children:["Cycles Completed: ",m]}),e.jsx("button",{onClick:()=>o(!r),className:`
            px-8 py-3 rounded-xl font-bold text-white transition-colors flex items-center justify-center gap-2 mx-auto
            ${r?"bg-red-500 hover:bg-red-600":"bg-primary-600 hover:bg-primary-700"}
          `,children:r?e.jsxs(e.Fragment,{children:[e.jsx(f,{size:20})," Stop"]}):e.jsxs(e.Fragment,{children:[e.jsx(y,{size:20})," Start Exercise"]})})]})]})};export{b as default};
