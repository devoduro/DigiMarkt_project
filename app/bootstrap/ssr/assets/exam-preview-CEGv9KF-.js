import { jsx, jsxs, Fragment } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card, b as CardContent } from "./card-D8SB2yrw.js";
import { S as Separator } from "./separator-R7EO2G8T.js";
import { s as systemCurrency } from "./utils-BmtPBcb0.js";
import { usePage, Link, router } from "@inertiajs/react";
import { Award, Clock, BookOpen, Target, Calendar } from "lucide-react";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-separator";
import "clsx";
import "tailwind-merge";
const CoursePreview = () => {
  const { auth, exam, system, wishlist, enrollment, translate } = usePage().props;
  const { frontend } = translate;
  const currency = systemCurrency(system.fields["selling_currency"]);
  const handleWishlist = () => {
    if (wishlist) {
      router.delete(route("exam-wishlists.destroy", exam.id));
    } else {
      router.post(route("exam-wishlists.store", exam.id));
    }
  };
  const enrollmentHandler = (exam2) => {
    var _a;
    router.post(route("exam-enrollments.store"), {
      user_id: (_a = auth.user) == null ? void 0 : _a.id,
      exam_id: exam2.id,
      enrollment_type: "free"
    });
  };
  return /* @__PURE__ */ jsx(Card, { className: "sticky top-24", children: /* @__PURE__ */ jsxs(CardContent, { className: "p-6", children: [
    /* @__PURE__ */ jsx("img", { className: "mb-4 w-full rounded-lg", src: exam.thumbnail ?? "/assets/images/blank-image.jpg", alt: "" }),
    enrollment ? /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
      /* @__PURE__ */ jsxs("div", { className: "rounded-lg bg-green-50 p-4 text-center", children: [
        /* @__PURE__ */ jsx(Award, { className: "mx-auto mb-2 h-8 w-8 text-green-600" }),
        /* @__PURE__ */ jsx("p", { className: "font-semibold text-green-900", children: "You're enrolled!" })
      ] }),
      /* @__PURE__ */ jsx(Button, { asChild: true, className: "w-full", children: /* @__PURE__ */ jsx(
        Link,
        {
          href: route("student.exam.show", {
            id: exam.id,
            tab: "attempts"
          }),
          children: "View Exam"
        }
      ) })
    ] }) : /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
      /* @__PURE__ */ jsx("h2", { className: "text-4xl font-bold capitalize", children: exam.pricing_type === "free" ? exam.pricing_type : exam.discount ? /* @__PURE__ */ jsxs(Fragment, { children: [
        /* @__PURE__ */ jsxs("span", { className: "font-semibold", children: [
          currency == null ? void 0 : currency.symbol,
          exam.discount_price
        ] }),
        /* @__PURE__ */ jsxs("span", { className: "text-muted-foreground ml-2 text-base font-medium line-through", children: [
          currency == null ? void 0 : currency.symbol,
          exam.price
        ] })
      ] }) : /* @__PURE__ */ jsx(Fragment, { children: /* @__PURE__ */ jsxs("span", { className: "font-semibold", children: [
        currency == null ? void 0 : currency.symbol,
        exam.price
      ] }) }) }),
      /* @__PURE__ */ jsx(Button, { className: "w-full px-1 sm:px-3", variant: "outline", size: "lg", onClick: handleWishlist, children: wishlist ? frontend.remove_from_wishlist : frontend.add_to_wishlist }),
      exam.pricing_type === "free" ? /* @__PURE__ */ jsx(Button, { size: "lg", className: "w-full", onClick: () => enrollmentHandler(exam), children: frontend.enroll_now }) : /* @__PURE__ */ jsx("a", { href: route("payments.index", { from: "web", item: "exam", id: exam.id }), children: /* @__PURE__ */ jsx(Button, { size: "lg", className: "w-full", children: frontend.buy_now }) })
    ] }),
    /* @__PURE__ */ jsx(Separator, { className: "my-6" }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-3 text-sm", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Clock, { className: "h-4 w-4 text-gray-400" }),
        /* @__PURE__ */ jsxs("span", { children: [
          exam.duration_hours > 0 && `${exam.duration_hours} hours `,
          exam.duration_minutes > 0 && `${exam.duration_minutes} minutes`
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(BookOpen, { className: "h-4 w-4 text-gray-400" }),
        /* @__PURE__ */ jsxs("span", { children: [
          exam.total_questions,
          " questions"
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Award, { className: "h-4 w-4 text-gray-400" }),
        /* @__PURE__ */ jsxs("span", { children: [
          exam.max_attempts,
          " attempts allowed"
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Target, { className: "h-4 w-4 text-gray-400" }),
        /* @__PURE__ */ jsxs("span", { children: [
          exam.pass_mark,
          " marks to pass"
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(Calendar, { className: "h-4 w-4 text-gray-400" }),
        /* @__PURE__ */ jsx("span", { children: exam.expiry_type === "lifetime" ? "Lifetime access" : `${exam.expiry_duration} days access` })
      ] })
    ] })
  ] }) });
};
export {
  CoursePreview as default
};
