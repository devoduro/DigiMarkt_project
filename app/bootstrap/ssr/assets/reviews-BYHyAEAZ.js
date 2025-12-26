import { jsxs, jsx, Fragment } from "react/jsx-runtime";
import { P as Progress } from "./progress-BuQTjce4.js";
import { u as useLang } from "./use-lang-44ndmTOc.js";
import { Star } from "lucide-react";
import { T as TableFooter } from "./table-footer-Bf3DvTcP.js";
import { A as Avatar, a as AvatarImage, b as AvatarFallback } from "./avatar-Cr_jqfHL.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { usePage } from "@inertiajs/react";
import { format } from "date-fns";
import "@radix-ui/react-progress";
import "./dropdown-menu-BIfW6iuW.js";
import "react";
import "@radix-ui/react-dropdown-menu";
import "./route-DlE7FdTW.js";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./scroll-area-DPHRDnwL.js";
import "@radix-ui/react-scroll-area";
import "@radix-ui/react-avatar";
import "clsx";
import "tailwind-merge";
const ReviewsOverview = ({ total_reviews, rating_distribution }) => {
  const { common, frontend } = useLang();
  const calculateAverageRating = () => {
    if (!(rating_distribution == null ? void 0 : rating_distribution.length) || total_reviews === 0) {
      return 0;
    }
    const totalScore = rating_distribution.reduce((sum, item) => {
      return sum + item.stars * (item.percentage / 100);
    }, 0);
    return Math.round(totalScore * 10) / 10;
  };
  const averageRating = calculateAverageRating();
  const renderStars = (rating, filled = true) => {
    return Array.from({ length: 5 }, (_, index) => /* @__PURE__ */ jsx(
      Star,
      {
        className: `h-4 w-4 ${filled && index < rating - 1 ? "fill-amber-400 text-amber-400" : filled && index < Math.floor(rating - 1) + 0.5 ? "fill-amber-400 text-amber-400" : "text-gray-300"}`
      },
      index
    ));
  };
  return /* @__PURE__ */ jsxs("div", { children: [
    /* @__PURE__ */ jsxs("div", { className: "mb-6 flex items-center justify-between gap-2", children: [
      /* @__PURE__ */ jsx("h2", { className: "text-xl font-semibold", children: frontend.student_reviews }),
      /* @__PURE__ */ jsxs("p", { className: "font-semibold", children: [
        total_reviews,
        " ",
        total_reviews === 1 ? "Review" : "Reviews"
      ] })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-4 sm:gap-8", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex min-w-[100px] flex-col items-center sm:min-w-[120px]", children: [
        /* @__PURE__ */ jsx("div", { className: "mb-2 text-6xl font-bold text-amber-600", children: averageRating }),
        /* @__PURE__ */ jsx("div", { className: "mb-2 flex gap-1", children: renderStars(1 + averageRating) }),
        /* @__PURE__ */ jsx("div", { className: "text-sm font-medium text-amber-600", children: common.rating })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "w-full space-y-1.5 sm:flex-1", children: rating_distribution.map((item) => /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx("div", { className: "flex w-20 flex-shrink-0 gap-1", children: renderStars(item.stars) }),
        /* @__PURE__ */ jsx("div", { className: "min-w-0 flex-1", children: /* @__PURE__ */ jsx(Progress, { value: item.percentage }) }),
        /* @__PURE__ */ jsx("div", { className: "w-12 flex-shrink-0 text-right", children: /* @__PURE__ */ jsxs("span", { className: "text-sm font-medium", children: [
          item.percentage ? Number(item.percentage).toFixed(2) : "0",
          "%"
        ] }) })
      ] }, item.stars)) })
    ] })
  ] });
};
const Reviews = () => {
  const { exam, reviews, reviewsStatistics, translate } = usePage().props;
  const { frontend } = translate;
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(ReviewsOverview, { total_reviews: reviewsStatistics.total_reviews, rating_distribution: reviewsStatistics.rating_distribution }),
    /* @__PURE__ */ jsxs("div", { className: "mt-6 border-t pt-6", children: [
      /* @__PURE__ */ jsx("h3", { className: "mb-6 text-xl font-semibold", children: frontend.student_reviews }),
      /* @__PURE__ */ jsx("div", { className: "space-y-6", children: reviews.data.length > 0 ? reviews.data.map((review) => /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
          /* @__PURE__ */ jsxs(Avatar, { className: "mt-1 h-8 w-8", children: [
            /* @__PURE__ */ jsx(AvatarImage, { src: review.user.photo || "", alt: review.user.name, className: "object-cover" }),
            /* @__PURE__ */ jsx(AvatarFallback, { children: review.user.name.charAt(0) })
          ] }),
          /* @__PURE__ */ jsxs("div", { children: [
            /* @__PURE__ */ jsx("p", { className: "font-semibold", children: review.user.name }),
            /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
              /* @__PURE__ */ jsx("div", { className: "flex gap-1", children: [1, 2, 3, 4, 5].map((star) => /* @__PURE__ */ jsx("button", { type: "button", children: /* @__PURE__ */ jsx(
                Star,
                {
                  className: cn("h-4 w-4", star <= review.rating ? "fill-amber-400 text-amber-400" : "text-gray-300")
                }
              ) }, star)) }),
              /* @__PURE__ */ jsx("p", { className: "text-muted-foreground text-xs", children: format(new Date(review.created_at), "MMM d, yyyy h:mm a") })
            ] })
          ] })
        ] }),
        /* @__PURE__ */ jsx("p", { className: "mt-3 text-sm", children: review.review })
      ] }, review.id)) : /* @__PURE__ */ jsx("p", { className: "p-3 text-center", children: frontend.no_reviews_found }) }),
      /* @__PURE__ */ jsx(TableFooter, { className: "mt-6", routeName: "exams.details", paginationInfo: reviews, routeParams: { slug: exam.slug, id: exam.id } })
    ] })
  ] });
};
export {
  Reviews as default
};
