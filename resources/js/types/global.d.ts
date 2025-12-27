import { PageProps as InertiaPageProps } from '@inertiajs/core';
import { AxiosInstance } from 'axios';
import { route as ziggyRoute } from 'ziggy-js';

declare global {
   interface Window {
      axios: AxiosInstance;
   }

   var route: typeof ziggyRoute;
}

export interface User {
   id: number;
   name: string;
   email: string;
   role: string;
   status: number;
}

export interface BreadcrumbItem {
   label: string;
   href?: string;
}

export interface Payout {
   id: number;
   amount: number;
   status: string;
   created_at: string;
}

export interface SharedData {
   auth: {
      user: User | null;
   };
   flash: {
      success?: string;
      error?: string;
      warning?: string;
   };
   system: {
      fields: {
         name: string;
         description: string;
         keywords: string;
         author: string;
         favicon?: string;
         logo_light?: string;
         logo_dark?: string;
         banner?: string;
         title?: string;
         direction?: string;
         global_style?: string;
         language_selector?: boolean;
      };
      sub_type?: string;
   };
   translate: {
      frontend: Record<string, string>;
      dashboard: Record<string, string>;
      [key: string]: Record<string, string>;
   };
   direction?: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = InertiaPageProps<T & SharedData> & {
   [key: string]: any;
};
