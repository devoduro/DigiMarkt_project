import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { M as Main } from "./main-BqrosZ6t.js";
import { Head, Link } from "@inertiajs/react";
import "next-themes";
import "sonner";
import "react";
const PageNotFound = () => {
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Page Not Found" }),
    /* @__PURE__ */ jsxs("div", { className: "relative flex min-h-screen items-center justify-center overflow-hidden", children: [
      /* @__PURE__ */ jsx("div", { className: "pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,#1f9be1,transparent_45%)]" }),
      /* @__PURE__ */ jsx("div", { className: "pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_bottom,#f43f5e,transparent_35%)]" }),
      /* @__PURE__ */ jsxs("div", { className: "relative mx-auto w-full max-w-3xl px-6 py-10 text-center", children: [
        /* @__PURE__ */ jsx("p", { className: "text-sm tracking-[0.35em] uppercase", children: "Oops! something went wrong" }),
        /* @__PURE__ */ jsx("h1", { className: "font-heading mt-4 mb-6 text-7xl leading-none font-black sm:text-8xl", children: "404" }),
        /* @__PURE__ */ jsx("p", { className: "text-muted-foreground mx-auto mb-10 max-w-2xl text-lg", children: "The page you're looking for doesn't exist or may have been moved. Let's get you back on track." }),
        /* @__PURE__ */ jsx("div", { className: "flex flex-col items-center justify-center gap-4 sm:flex-row", children: /* @__PURE__ */ jsx(
          Link,
          {
            href: "/",
            className: "inline-flex items-center justify-center rounded-full bg-white px-6 py-3 font-semibold text-slate-900 shadow-lg shadow-slate-900/30 transition hover:-translate-y-0.5",
            children: "Return Home"
          }
        ) })
      ] })
    ] })
  ] });
};
PageNotFound.layout = (page) => /* @__PURE__ */ jsx(Main, { children: page });
export {
  PageNotFound as default
};
