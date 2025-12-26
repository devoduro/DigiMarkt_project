import { jsxs, jsx } from "react/jsx-runtime";
import { A as AppLogo } from "./app-logo-42nmPdEQ.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { usePage, Link } from "@inertiajs/react";
import { DynamicIcon } from "lucide-react/dynamic";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
const Footer = () => {
  const { footer, system } = usePage().props;
  const sortedItems = footer.footer_items.sort((a, b) => a.sort - b.sort);
  const listItems = sortedItems.filter((item) => item.type === "list" && item.active);
  const copyrightItem = sortedItems.find((item) => item.type === "copyright" && item.active);
  const socialMediaItem = sortedItems.find((item) => item.type === "social_media" && item.active);
  return /* @__PURE__ */ jsxs("div", { className: "text-primary-foreground dark:text-primary bg-primary dark:bg-primary-dark relative pt-20", children: [
    /* @__PURE__ */ jsx("div", { className: "container space-y-9 pb-5", children: /* @__PURE__ */ jsxs("div", { className: "flex flex-col items-start justify-between gap-10 md:flex-row", children: [
      /* @__PURE__ */ jsxs("div", { className: "w-full space-y-5 md:max-w-[300px]", children: [
        /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx(Link, { href: "/", children: /* @__PURE__ */ jsx(AppLogo, { className: "h-7", theme: "light" }) }) }),
        /* @__PURE__ */ jsx("p", { className: "text-muted dark:text-muted-foreground text-sm", children: system.fields.description }),
        socialMediaItem && /* @__PURE__ */ jsx("div", { className: "flex flex-wrap gap-3", children: socialMediaItem.items && Array.isArray(socialMediaItem.items) && socialMediaItem.items.map((socialItem, idx) => /* @__PURE__ */ jsx(
          Button,
          {
            size: "icon",
            variant: "ghost",
            className: "bg-muted hover:bg-primary hover:text-primary-foreground text-primary rounded-full transition-colors",
            asChild: true,
            children: /* @__PURE__ */ jsxs(Link, { href: socialItem.url, target: "_blank", rel: "noopener noreferrer", children: [
              /* @__PURE__ */ jsx(DynamicIcon, { name: socialItem.icon, className: "h-5 w-5" }),
              /* @__PURE__ */ jsx("span", { className: "sr-only", children: socialItem.title })
            ] })
          },
          idx
        )) })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "flex w-full flex-col justify-between gap-10 md:max-w-[640px] md:flex-row", children: listItems.map((section) => {
        var _a;
        return /* @__PURE__ */ jsxs("div", { className: "relative w-full", children: [
          /* @__PURE__ */ jsx("p", { className: "mb-3 text-lg font-semibold", children: section.title }),
          /* @__PURE__ */ jsx("ul", { className: "text-muted dark:text-muted-foreground flex flex-col gap-2 text-sm", children: (_a = section.items) == null ? void 0 : _a.map(
            (item, itemIndex) => section.slug === "address" ? /* @__PURE__ */ jsx("li", { children: item.title }, `item-${itemIndex}`) : /* @__PURE__ */ jsx("li", { children: /* @__PURE__ */ jsx(Link, { href: item.url, children: item.title }) }, `item-${itemIndex}`)
          ) })
        ] }, section.id);
      }) })
    ] }) }),
    copyrightItem && /* @__PURE__ */ jsx("div", { className: "px-6 py-8 text-center", children: /* @__PURE__ */ jsx("p", { className: "text-muted dark:text-muted-foreground text-sm", children: copyrightItem.title }) })
  ] });
};
export {
  Footer as default
};
