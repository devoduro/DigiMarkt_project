import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { E as ExamCard1 } from "./exam-card-1-DbrZWQ_h.js";
import { T as TableFooter } from "./table-footer-Bf3DvTcP.js";
import { g as getQueryParams } from "./route-DlE7FdTW.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { usePage, Head } from "@inertiajs/react";
import Layout from "./layout-DSahfqIm.js";
import "./badge-B4crNM73.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./button-jZyzwgdo.js";
import "react";
import "./card-D8SB2yrw.js";
import "lucide-react";
import "./dropdown-menu-BIfW6iuW.js";
import "@radix-ui/react-dropdown-menu";
import "./use-lang-44ndmTOc.js";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "clsx";
import "tailwind-merge";
import "./sheet-CuVwNO0O.js";
import "@radix-ui/react-dialog";
import "./tooltip-DswKljFZ.js";
import "@radix-ui/react-tooltip";
import "./use-screen-B7SDA5zE.js";
import "./landing-layout-BL814gaK.js";
import "./index-C5IRp7HU.js";
import "./app-logo-42nmPdEQ.js";
import "lucide-react/dynamic";
import "./main-BqrosZ6t.js";
import "next-themes";
import "sonner";
import "./use-auth-8FvJer_G.js";
import "./appearance-Df_e7R4w.js";
import "./language-BbuOCfpR.js";
import "./separator-R7EO2G8T.js";
import "@radix-ui/react-separator";
import "./notification-BXalLCUz.js";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "date-fns";
import "./profile-toggle-D0g01Tbw.js";
import "./avatar-Cr_jqfHL.js";
import "@radix-ui/react-avatar";
import "nanoid";
import "./exam-filter-sGttnfmO.js";
import "./search-input-_KZEhUeb.js";
import "./debounce-ZFxqVthq.js";
import "./radio-group-sSS5HHUP.js";
import "@radix-ui/react-radio-group";
const Index = (props) => {
  var _a, _b, _c, _d, _e;
  const { url } = usePage();
  const { exams, category, system } = props;
  const urlParams = getQueryParams(url);
  const siteName = ((_a = system == null ? void 0 : system.fields) == null ? void 0 : _a.name) || "Mentor Learning Management System";
  const totalExams = (exams == null ? void 0 : exams.total) || 0;
  const siteUrl = url;
  const siteOrigin = typeof window !== "undefined" ? window.location.origin : url.split("/").slice(0, 3).join("/");
  let pageTitle = category ? category.title : "All";
  let pageDescription = `Browse ${totalExams}+ professional certification exams from expert instructors. Test your skills with our comprehensive exam catalog.`;
  let pageKeywords = "online exams, certification exams, professional tests, skills assessment, exam preparation";
  let ogTitle = "All Exams";
  if (category && category.title) {
    pageTitle = `${category.title} Exams`;
    ogTitle = `${category.title} Exams`;
    pageDescription = `Explore ${totalExams} ${category.title.toLowerCase()} certification exams. Test your expertise in ${category.title.toLowerCase()} with industry-standard assessments.`;
    pageKeywords = `${category.title.toLowerCase()}, exams, certification, assessment, ${category.title} test, professional certification`;
  }
  const fullTitle = `${pageTitle} | ${siteName}`;
  const examImage = (_c = (_b = exams == null ? void 0 : exams.data) == null ? void 0 : _b[0]) == null ? void 0 : _c.thumbnail;
  const categoryImage = (category == null ? void 0 : category.thumbnail) || examImage;
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsxs(Head, { children: [
      /* @__PURE__ */ jsx("title", { children: fullTitle }),
      /* @__PURE__ */ jsx("meta", { name: "description", content: pageDescription }),
      /* @__PURE__ */ jsx("meta", { name: "keywords", content: pageKeywords }),
      /* @__PURE__ */ jsx("meta", { name: "author", content: ((_d = system == null ? void 0 : system.fields) == null ? void 0 : _d.author) || "UiLib" }),
      /* @__PURE__ */ jsx("meta", { property: "og:type", content: "website" }),
      /* @__PURE__ */ jsx("meta", { property: "og:url", content: siteUrl }),
      /* @__PURE__ */ jsx("meta", { property: "og:title", content: ogTitle }),
      /* @__PURE__ */ jsx("meta", { property: "og:description", content: pageDescription }),
      /* @__PURE__ */ jsx("meta", { property: "og:site_name", content: siteName }),
      /* @__PURE__ */ jsx("meta", { property: "og:image", content: categoryImage }),
      /* @__PURE__ */ jsx("meta", { property: "og:image:width", content: "1200" }),
      /* @__PURE__ */ jsx("meta", { property: "og:image:height", content: "630" }),
      /* @__PURE__ */ jsx("meta", { property: "og:image:alt", content: `${pageTitle} - Exam Catalog` }),
      /* @__PURE__ */ jsx("meta", { name: "twitter:card", content: "summary_large_image" }),
      /* @__PURE__ */ jsx("meta", { name: "twitter:title", content: ogTitle }),
      /* @__PURE__ */ jsx("meta", { name: "twitter:description", content: pageDescription }),
      /* @__PURE__ */ jsx("meta", { name: "twitter:image", content: categoryImage }),
      category && /* @__PURE__ */ jsx("meta", { name: "category:name", content: category.title }),
      category && /* @__PURE__ */ jsx("meta", { name: "category:slug", content: category.slug }),
      /* @__PURE__ */ jsx("meta", { name: "exams:total", content: totalExams.toString() }),
      /* @__PURE__ */ jsx("meta", { name: "exams:page", content: ((exams == null ? void 0 : exams.current_page) || 1).toString() }),
      /* @__PURE__ */ jsx("script", { type: "application/ld+json", children: JSON.stringify({
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        name: pageTitle,
        description: pageDescription,
        url: siteUrl,
        image: categoryImage,
        provider: {
          "@type": "Organization",
          name: siteName,
          url: siteOrigin
        },
        mainEntity: {
          "@type": "ItemList",
          name: `${pageTitle} Collection`,
          description: pageDescription,
          numberOfItems: totalExams,
          itemListElement: ((_e = exams == null ? void 0 : exams.data) == null ? void 0 : _e.slice(0, 10).map((exam, index) => {
            var _a2, _b2;
            return {
              "@type": "ExaminationTest",
              position: index + 1,
              name: exam.title,
              description: exam.short_description || exam.description || "",
              image: exam.thumbnail || exam.banner || "",
              provider: {
                "@type": "Organization",
                name: siteName
              },
              instructor: ((_b2 = (_a2 = exam.instructor) == null ? void 0 : _a2.user) == null ? void 0 : _b2.name) ? {
                "@type": "Person",
                name: exam.instructor.user.name
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
              }
            };
          }).filter(Boolean)) || []
        },
        ...category && {
          about: {
            "@type": "Thing",
            name: category.title,
            description: `Professional ${category.title.toLowerCase()} certification exams`
          }
        }
      }) })
    ] }),
    /* @__PURE__ */ jsx(
      "div",
      {
        className: cn(urlParams["view"] && urlParams["view"] === "list" ? "space-y-7" : "grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3"),
        children: exams.data.map((exam) => /* @__PURE__ */ jsx(ExamCard1, { exam, viewType: urlParams["view"] }, exam.id))
      }
    ),
    /* @__PURE__ */ jsx(
      TableFooter,
      {
        className: "mt-6 p-5 sm:p-7",
        routeName: "category.exams",
        paginationInfo: exams,
        routeParams: {
          category: category ? category.slug : "all"
        }
      }
    )
  ] });
};
Index.layout = (page) => /* @__PURE__ */ jsx(Layout, { children: page });
export {
  Index as default
};
