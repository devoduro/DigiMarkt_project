import { jsxs, jsx } from "react/jsx-runtime";
import { A as AppLogo } from "./app-logo-42nmPdEQ.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { usePage, Link } from "@inertiajs/react";
import { DynamicIcon } from "lucide-react/dynamic";
const Index = () => {
  const { props } = usePage();
  const { footer, system } = props;
  const sortedItems = footer.footer_items.sort((a, b) => a.sort - b.sort);
  const listItems = sortedItems.filter((item) => item.type === "list" && item.active);
  const copyrightItem = sortedItems.find((item) => item.type === "copyright" && item.active);
  const socialMediaItem = sortedItems.find((item) => item.type === "social_media" && item.active);
  const paymentMethodsItem = sortedItems.find((item) => item.type === "payment_methods" && item.active);
  return /* @__PURE__ */ jsxs("div", { className: "overflow-hidden bg-[rgba(255,222,99,0.06)]", children: [
    /* @__PURE__ */ jsxs("div", { className: "container space-y-9 pt-[60px] pb-5", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex flex-col items-start justify-between gap-10 md:flex-row", children: [
        /* @__PURE__ */ jsxs("div", { className: "w-full space-y-5 md:max-w-[300px]", children: [
          /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx(Link, { href: "/", children: /* @__PURE__ */ jsx(AppLogo, { className: "h-7" }) }) }),
          /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: system.fields.description }),
          socialMediaItem && /* @__PURE__ */ jsx("div", { className: "flex flex-wrap gap-3", children: socialMediaItem.items && Array.isArray(socialMediaItem.items) && socialMediaItem.items.map((socialItem, idx) => /* @__PURE__ */ jsx(
            Button,
            {
              size: "icon",
              variant: "ghost",
              className: "bg-muted hover:bg-primary hover:text-primary-foreground text-muted-foreground rounded-full transition-colors",
              asChild: true,
              children: /* @__PURE__ */ jsxs("a", { href: socialItem.url, target: "_blank", children: [
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
            /* @__PURE__ */ jsx("ul", { className: "text-muted-foreground flex flex-col gap-2 text-sm", children: (_a = section.items) == null ? void 0 : _a.map(
              (item, itemIndex) => section.slug === "address" ? /* @__PURE__ */ jsx("li", { children: item.title }, `item-${itemIndex}`) : /* @__PURE__ */ jsx("li", { children: /* @__PURE__ */ jsx(Link, { href: item.url, children: item.title }) }, `item-${itemIndex}`)
            ) })
          ] }, section.id);
        }) })
      ] }),
      paymentMethodsItem && /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
        /* @__PURE__ */ jsx("h3", { className: "text-base font-medium", children: paymentMethodsItem.title }),
        /* @__PURE__ */ jsx("div", { className: "flex flex-wrap gap-3", children: paymentMethodsItem.items && Array.isArray(paymentMethodsItem.items) && paymentMethodsItem.items.map((paymentItem, idx) => /* @__PURE__ */ jsx("div", { className: "flex h-7 items-center justify-center gap-5 md:justify-start", children: paymentItem.image && /* @__PURE__ */ jsx("img", { src: paymentItem.image, alt: `Payment method ${idx + 1}`, className: "h-full w-auto object-contain" }) }, idx)) })
      ] })
    ] }),
    copyrightItem && /* @__PURE__ */ jsx("div", { className: "px-6 py-8 text-center", children: /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-sm", children: copyrightItem.title }) })
  ] });
};
export {
  Index as I
};
