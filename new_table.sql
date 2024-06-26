
   INFO  Running migrations.  

  2024_03_02_090126_new_table_and_update_table ................................................................................................  
  Γçé create table `friendship_status` (`id` bigint unsigned not null auto_increment primary key, `friend_ship_status_id` bigint unsigned not null, `friend_ship_status_name` varchar(255) not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé create table `friendships` (`id` bigint unsigned not null auto_increment primary key, `user_id` bigint unsigned not null, `follower_id` bigint unsigned not null, `friend_ship_status` bigint unsigned not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `friendships` add constraint `friendships_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete cascade  
  Γçé alter table `friendships` add constraint `friendships_friend_id_foreign` foreign key (`friend_id`) references `users` (`id`) on delete cascade  
  Γçé alter table `friendships` add constraint `friendships_friend_ship_status_foreign` foreign key (`friend_ship_status`) references `friendship_status` (`friend_ship_status_id`) on delete cascade  
  Γçé create table `social_groups` (`id` bigint unsigned not null auto_increment primary key, `owner_id` bigint unsigned not null, `group_name` varchar(255) null, `group_status` varchar(255) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `social_groups` add constraint `social_groups_owner_id_foreign` foreign key (`owner_id`) references `users` (`id`) on delete cascade  
  Γçé create table `social_groups_members` (`id` bigint unsigned not null auto_increment primary key, `social_group_id` bigint unsigned not null, `user_id` bigint unsigned not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `social_groups_members` add constraint `social_groups_members_social_group_id_foreign` foreign key (`social_group_id`) references `social_groups` (`id`) on delete cascade  
  Γçé alter table `social_groups_members` add constraint `social_groups_members_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete cascade  
  Γçé create table `social_pages` (`id` bigint unsigned not null auto_increment primary key, `owner_id` bigint unsigned not null, `page_name` varchar(255) null, `page_status` varchar(255) null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `social_pages` add constraint `social_pages_owner_id_foreign` foreign key (`owner_id`) references `users` (`id`) on delete cascade  
  Γçé create table `social_page_followers` (`id` bigint unsigned not null auto_increment primary key, `social_page_id` bigint unsigned not null, `user_id` bigint unsigned not null, `created_at` timestamp null, `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'  
  Γçé alter table `social_page_followers` add constraint `social_page_followers_social_page_id_foreign` foreign key (`social_page_id`) references `social_pages` (`id`) on delete cascade  
  Γçé alter table `social_page_followers` add constraint `social_page_followers_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete cascade  

