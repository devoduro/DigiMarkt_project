import { jsx, jsxs, Fragment } from "react/jsx-runtime";
import { T as Tabs } from "./tabs-CPx41tqt.js";
import { S as Separator } from "./separator-R7EO2G8T.js";
import { T as TabsList, a as TabsTrigger, b as TabsContent } from "./tabs-BOXC0x8t.js";
import { L as LandingLayout } from "./landing-layout-BL814gaK.js";
import { s as systemCurrency } from "./utils-BmtPBcb0.js";
import { Head, Link } from "@inertiajs/react";
import Details from "./details-XYkY_YgT.js";
import ExamHeader from "./exam-header-D2k3dWjS.js";
import CoursePreview from "./exam-preview-CEGv9KF-.js";
import Instructor from "./instructor-D1pBJU7R.js";
import Overview from "./overview-Dj06SAZV.js";
import Reviews from "./reviews-BYHyAEAZ.js";
import "react";
import "@radix-ui/react-separator";
import "@radix-ui/react-tabs";
import "./index-C5IRp7HU.js";
import "./app-logo-42nmPdEQ.js";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "lucide-react/dynamic";
import "./main-BqrosZ6t.js";
import "next-themes";
import "sonner";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "lucide-react";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "./use-auth-8FvJer_G.js";
import "./use-screen-B7SDA5zE.js";
import "./appearance-Df_e7R4w.js";
import "./language-BbuOCfpR.js";
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./profile-toggle-D0g01Tbw.js";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "nanoid";
import "clsx";
import "tailwind-merge";
import "./rating-stars-Cw4PaRTw.js";
import "./card-D8SB2yrw.js";
import "./accordion-DVAMjldm.js";
import "@radix-ui/react-accordion";
import "richtor";
/* empty css                 */
import "./progress-BuQTjce4.js";
import "@radix-ui/react-progress";
import "./use-lang-44ndmTOc.js";
import "./table-footer-Bf3DvTcP.js";
import "./route-DlE7FdTW.js";
const Show = ({ tab, exam, system, translate }) => {
  var _a, _b, _c, _d, _e, _f, _g;
  const { button } = translate;
  const tabs = [
    {
      value: "overview",
      label: button.overview,
      Component: /* @__PURE__ */ jsx(Overview, {})
    },
    {
      value: "details",
      label: button.details,
      Component: /* @__PURE__ */ jsx(Details, {})
    },
    {
      value: "instructor",
      label: button.instructor,
      Component: /* @__PURE__ */ jsx(Instructor, {})
    },
    {
      value: "reviews",
      label: button.reviews,
      Component: /* @__PURE__ */ jsx(Reviews, {})
    }
  ];
  const pageTitle = exam.meta_title || `${exam.title} | ${(_a = system.fields) == null ? void 0 : _a.name}`;
  const pageDescription = exam.meta_description || exam.short_description || exam.description || "Professional certification exam";
  const pageKeywords = exam.meta_keywords || `${exam.title}, certification exam, professional test, ${((_b = system.fields) == null ? void 0 : _b.keywords) || "LMS"}`;
  const ogTitle = exam.og_title || exam.title;
  const ogDescription = exam.og_description || pageDescription;
  const examImage = exam.thumbnail || exam.banner || "";
  const siteName = (_c = system.fields) == null ? void 0 : _c.name;
  const siteUrl = typeof window !== "undefined" ? window.location.href : "";
  systemCurrency(system.fields["selling_currency"]);
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsxs(Head, { children: [
      /* @__PURE__ */ jsx("title", { children: pageTitle }),
      /* @__PURE__ */ jsx("meta", { name: "description", content: pageDescription }),
      /* @__PURE__ */ jsx("meta", { name: "keywords", content: pageKeywords }),
      /* @__PURE__ */ jsx("meta", { name: "author", content: ((_d = system.fields) == null ? void 0 : _d.author) || "UiLib" }),
      /* @__PURE__ */ jsx("meta", { property: "og:type", content: "article" }),
      /* @__PURE__ */ jsx("meta", { property: "og:url", content: siteUrl }),
      /* @__PURE__ */ jsx("meta", { property: "og:title", content: ogTitle }),
      /* @__PURE__ */ jsx("meta", { property: "og:description", content: ogDescription }),
      /* @__PURE__ */ jsx("meta", { property: "og:site_name", content: siteName }),
      /* @__PURE__ */ jsx("meta", { property: "og:image", content: examImage }),
      /* @__PURE__ */ jsx("meta", { property: "og:image:width", content: "1200" }),
      /* @__PURE__ */ jsx("meta", { property: "og:image:height", content: "630" }),
      /* @__PURE__ */ jsx("meta", { property: "og:image:alt", content: exam.title }),
      /* @__PURE__ */ jsx("meta", { name: "twitter:card", content: "summary_large_image" }),
      /* @__PURE__ */ jsx("meta", { name: "twitter:title", content: ogTitle }),
      /* @__PURE__ */ jsx("meta", { name: "twitter:description", content: ogDescription }),
      examImage && /* @__PURE__ */ jsx("meta", { name: "twitter:image", content: examImage }),
      /* @__PURE__ */ jsx("meta", { name: "exam:title", content: exam.title }),
      /* @__PURE__ */ jsx("meta", { name: "exam:level", content: exam.level || "" }),
      /* @__PURE__ */ jsx("meta", { name: "exam:price", content: ((_e = exam.price) == null ? void 0 : _e.toString()) || "0" }),
      /* @__PURE__ */ jsx("meta", { name: "exam:pricing_type", content: exam.pricing_type }),
      exam.instructor && /* @__PURE__ */ jsx("meta", { name: "exam:instructor", content: ((_f = exam.instructor.user) == null ? void 0 : _f.name) || "" }),
      /* @__PURE__ */ jsx("script", { type: "application/ld+json", children: JSON.stringify({
        "@context": "https://schema.org",
        "@type": "ExaminationTest",
        name: exam.title,
        description: pageDescription,
        image: examImage,
        provider: {
          "@type": "Organization",
          name: siteName,
          url: typeof window !== "undefined" ? window.location.origin : ""
        },
        instructor: exam.instructor ? {
          "@type": "Person",
          name: ((_g = exam.instructor.user) == null ? void 0 : _g.name) || ""
        } : void 0,
        educationalLevel: exam.level,
        offers: exam.pricing_type === "paid" ? {
          "@type": "Offer",
          price: exam.price || 0,
          priceCurrency: "USD",
          availability: "https://schema.org/InStock"
        } : {
          "@type": "Offer",
          price: 0,
          priceCurrency: "USD",
          availability: "https://schema.org/InStock"
        },
        aggregateRating: {
          "@type": "AggregateRating",
          ratingValue: exam.average_rating
        }
      }) })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "container grid grid-cols-1 gap-7 py-10 md:grid-cols-3", children: [
      /* @__PURE__ */ jsxs("div", { className: "space-y-8 md:col-span-2", children: [
        /* @__PURE__ */ jsx(ExamHeader, {}),
        /* @__PURE__ */ jsxs(Tabs, { value: tab, className: "bg-card overflow-hidden rounded-md border shadow", children: [
          /* @__PURE__ */ jsx("div", { className: "overflow-x-auto overflow-y-hidden", children: /* @__PURE__ */ jsx(TabsList, { className: "vertical-tabs-list", children: tabs.map(({ label, value }) => /* @__PURE__ */ jsx(Link, { href: route("exams.details", { slug: exam.slug, id: exam.id, tab: value }), children: /* @__PURE__ */ jsx(TabsTrigger, { value, className: "vertical-tabs-trigger", children: /* @__PURE__ */ jsx("span", { children: label }) }, value) }, value)) }) }),
          /* @__PURE__ */ jsx(Separator, { className: "mt-[1px]" }),
          tabs.map(({ value, Component }) => /* @__PURE__ */ jsx(TabsContent, { value, className: "m-0 p-5", children: Component }, value))
        ] })
      ] }),
      /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx(CoursePreview, {}) })
    ] })
  ] });
};
Show.layout = (page) => /* @__PURE__ */ jsx(LandingLayout, { children: page, customizable: false });
export {
  Show as default
};
