import { jsxs, jsx, Fragment } from "react/jsx-runtime";
import { B as Badge } from "./badge-B4crNM73.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card, b as CardContent, e as CardFooter } from "./card-D8SB2yrw.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { Link } from "@inertiajs/react";
import { Star, Clock, Users, Heart, ShoppingCart } from "lucide-react";
const RatingDisplay = ({ rating, reviewCount, showCount = true, size = "md", className }) => {
  const sizeClasses = {
    sm: "h-3 w-3",
    md: "h-4 w-4",
    lg: "h-5 w-5"
  };
  const textSizeClasses = {
    sm: "text-xs",
    md: "text-sm",
    lg: "text-base"
  };
  const isValidRating = typeof rating === "number" && Number.isFinite(rating);
  const normalizedRating = isValidRating ? Math.min(Math.max(rating, 0), 5) : 0;
  return /* @__PURE__ */ jsxs("div", { className: cn("flex items-center gap-1", className), children: [
    /* @__PURE__ */ jsx("div", { className: "flex items-center", children: [1, 2, 3, 4, 5].map((star) => /* @__PURE__ */ jsx(
      Star,
      {
        className: cn(sizeClasses[size], star <= normalizedRating ? "fill-yellow-400 text-yellow-400" : "fill-gray-200 text-gray-200")
      },
      star
    )) }),
    /* @__PURE__ */ jsx("span", { className: cn("font-medium text-gray-700", textSizeClasses[size]), children: isValidRating ? normalizedRating.toFixed(1) : "—" }),
    showCount && reviewCount !== void 0 && /* @__PURE__ */ jsxs("span", { className: cn("text-gray-500", textSizeClasses[size]), children: [
      "(",
      reviewCount,
      ")"
    ] })
  ] });
};
const ExamCard1 = ({ exam, variant = "default", viewType = "grid", onAddToCart, onAddToWishlist, className }) => {
  var _a, _b;
  const isCompact = variant === "compact";
  const examUrl = route("exams.details", { slug: exam.slug, id: exam.id });
  return /* @__PURE__ */ jsxs(Card, { className: cn("group", className, viewType === "list" && "flex flex-row"), children: [
    /* @__PURE__ */ jsx(Link, { href: examUrl, className: cn(viewType === "list" && "w-1/3"), children: /* @__PURE__ */ jsxs("div", { className: cn("relative overflow-hidden", viewType === "grid" ? "aspect-video" : "h-full min-h-[200px]"), children: [
      exam.thumbnail ? /* @__PURE__ */ jsx("img", { src: exam.thumbnail, alt: exam.title, className: "h-full w-full object-cover transition-transform group-hover:scale-105" }) : /* @__PURE__ */ jsx("div", { className: "from-primary/20 to-primary/5 flex h-full items-center justify-center bg-gradient-to-br", children: /* @__PURE__ */ jsx("span", { className: "text-primary/30 text-4xl font-bold", children: exam.title.charAt(0) }) }),
      exam.level && /* @__PURE__ */ jsx(Badge, { className: "absolute top-2 left-2 capitalize", children: exam.level })
    ] }) }),
    /* @__PURE__ */ jsxs("div", { className: cn("flex flex-col", viewType === "list" && "flex-1"), children: [
      /* @__PURE__ */ jsxs(CardContent, { className: "p-4", children: [
        /* @__PURE__ */ jsx(Link, { href: examUrl, children: /* @__PURE__ */ jsx("h3", { className: "group-hover:text-primary mb-2 line-clamp-2 text-lg font-semibold transition-colors", children: exam.title }) }),
        !isCompact && exam.short_description && /* @__PURE__ */ jsx("p", { className: "text-muted-foreground mb-3 line-clamp-2 text-sm", children: exam.short_description }),
        /* @__PURE__ */ jsxs("div", { className: "text-muted-foreground mb-3 flex items-center gap-1 text-sm", children: [
          /* @__PURE__ */ jsx("span", { children: "by" }),
          /* @__PURE__ */ jsx("span", { className: "font-medium", children: ((_b = (_a = exam.instructor) == null ? void 0 : _a.user) == null ? void 0 : _b.name) || "Instructor" })
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "text-muted-foreground mb-3 flex flex-wrap items-center gap-3 text-sm", children: [
          /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-1", children: [
            /* @__PURE__ */ jsx(Clock, { className: "h-4 w-4" }),
            /* @__PURE__ */ jsxs("span", { children: [
              exam.duration_hours,
              "h ",
              exam.duration_minutes,
              "m"
            ] })
          ] }),
          /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-1", children: [
            /* @__PURE__ */ jsx(Users, { className: "h-4 w-4" }),
            /* @__PURE__ */ jsxs("span", { children: [
              exam.enrollments_count || 0,
              " students"
            ] })
          ] })
        ] }),
        exam.average_rating !== void 0 && /* @__PURE__ */ jsx(RatingDisplay, { rating: exam.average_rating, reviewCount: exam.reviews_count, size: "sm", className: "mb-3" })
      ] }),
      /* @__PURE__ */ jsxs(CardFooter, { className: cn("flex items-center justify-between border-t p-4", viewType === "list" && "mt-auto"), children: [
        /* @__PURE__ */ jsx("div", { className: "flex items-baseline gap-2", children: exam.pricing_type === "free" ? /* @__PURE__ */ jsx("span", { className: "text-lg font-bold text-green-600", children: "Free" }) : /* @__PURE__ */ jsxs(Fragment, { children: [
          /* @__PURE__ */ jsxs("span", { className: "text-2xl font-bold", children: [
            "$",
            exam.discount_price
          ] }),
          exam.discount > 0 && /* @__PURE__ */ jsxs("span", { className: "text-sm text-gray-500 line-through", children: [
            "$",
            exam.price
          ] })
        ] }) }),
        /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
          onAddToWishlist && /* @__PURE__ */ jsx(
            Button,
            {
              variant: "outline",
              size: "icon",
              onClick: (e) => {
                e.preventDefault();
                onAddToWishlist(exam);
              },
              children: /* @__PURE__ */ jsx(Heart, { className: "h-4 w-4" })
            }
          ),
          onAddToCart && exam.pricing_type === "paid" && /* @__PURE__ */ jsx(
            Button,
            {
              variant: "default",
              size: "icon",
              onClick: (e) => {
                e.preventDefault();
                onAddToCart(exam);
              },
              children: /* @__PURE__ */ jsx(ShoppingCart, { className: "h-4 w-4" })
            }
          )
        ] })
      ] })
    ] })
  ] });
};
export {
  ExamCard1 as E
};
