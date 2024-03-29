
   INFO  Running migrations.  

  2014_10_12_000000_create_users_table ...................................................................................  
  Γçé create table `users` (`id` bigint unsigned not null auto_increment primary key, `name` varchar(255) not null, `email` varchar(255) not null, `email_verified_at` timestamp null, `loginAt` datetime null, `logoutAt` datetime null, `dateofbirth` datetime null, `password` varchar(255) not null, `remember_token` varchar(100) null, `referal_id` bigint unsigned not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `users` add constraint `users_referal_id_foreign` foreign key (`referal_id`) references `referals` (`id`) on delete cascade  
  Γçé alter table `users` add unique `users_email_unique`(`email`)  
  2014_10_12_100000_create_password_reset_tokens_table ...................................................................  
  Γçé create table `password_reset_tokens` (`email` varchar(255) not null, `token` varchar(255) not null, `created_at` timestamp null, primary key (`email`)) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  2019_08_19_000000_create_failed_jobs_table .............................................................................  
  Γçé create table `failed_jobs` (`id` bigint unsigned not null auto_increment primary key, `uuid` varchar(255) not null, `connection` text not null, `queue` text not null, `payload` longtext not null, `exception` longtext not null, `failed_at` timestamp not null default CURRENT_TIMESTAMP) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `failed_jobs` add unique `failed_jobs_uuid_unique`(`uuid`)  
  2019_12_14_000001_create_personal_access_tokens_table ..................................................................  
  Γçé create table `personal_access_tokens` (`id` bigint unsigned not null auto_increment primary key, `tokenable_type` varchar(255) not null, `tokenable_id` bigint unsigned not null, `name` varchar(255) not null, `token` varchar(64) not null, `abilities` text null, `last_used_at` timestamp null, `expires_at` timestamp null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `personal_access_tokens` add index `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`)  
  Γçé alter table `personal_access_tokens` add unique `personal_access_tokens_token_unique`(`token`)  
  2024_02_29_101402_create_posts_table ...................................................................................  
  Γçé create table `posts` (`id` bigint unsigned not null auto_increment primary key, `user_id` bigint unsigned not null, `content` text not null, `iamge` text null, `video` text null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `posts` add constraint `posts_user_id_foreign` foreign key (`user_id`) references `users` (`id`)  
  2024_02_29_101653_create_comments_table ................................................................................  
  Γçé create table `comments` (`id` bigint unsigned not null auto_increment primary key, `comment_content` text null, `post_id` bigint unsigned not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `comments` add constraint `comments_post_id_foreign` foreign key (`post_id`) references `posts` (`id`) on delete cascade  
  2024_02_29_103039_create_user_details_table ............................................................................  
  Γçé create table `user_details` (`id` bigint unsigned not null auto_increment primary key, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  2024_02_29_103623_create_referals_table ................................................................................  
  Γçé create table `referals` (`id` bigint unsigned not null auto_increment primary key, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  

