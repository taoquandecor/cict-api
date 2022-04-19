USE [master]
GO
/****** Object:  Database [TOS]    Script Date: 6/16/2020 5:16:16 PM ******/
CREATE DATABASE [TOS]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'TOS', FILENAME = N'E:\DATA\DATA\TOS.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'TOS_log', FILENAME = N'E:\DATA\DATA\TOS_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [TOS].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [TOS] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [TOS] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [TOS] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [TOS] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [TOS] SET ARITHABORT OFF 
GO
ALTER DATABASE [TOS] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [TOS] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [TOS] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [TOS] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [TOS] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [TOS] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [TOS] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [TOS] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [TOS] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [TOS] SET  DISABLE_BROKER 
GO
ALTER DATABASE [TOS] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [TOS] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [TOS] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [TOS] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [TOS] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [TOS] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [TOS] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [TOS] SET RECOVERY FULL 
GO
ALTER DATABASE [TOS] SET  MULTI_USER 
GO
ALTER DATABASE [TOS] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [TOS] SET DB_CHAINING OFF 
GO
ALTER DATABASE [TOS] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [TOS] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [TOS] SET DELAYED_DURABILITY = DISABLED 
GO
USE [TOS]
GO
/****** Object:  User [kienvt01]    Script Date: 6/16/2020 5:16:16 PM ******/
CREATE USER [kienvt01] FOR LOGIN [kienvt01] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_owner] ADD MEMBER [kienvt01]
GO
/****** Object:  Table [dbo].[tbAccount]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbAccount](
	[Id] [uniqueidentifier] NOT NULL,
	[Status] [smallint] NOT NULL,
	[Code] [varchar](25) NOT NULL,
	[Hash] [varchar](32) NULL,
	[Password] [varchar](100) NULL,
	[DisplayName] [nvarchar](100) NOT NULL,
	[Email] [varchar](256) NULL,
	[Phone] [varchar](20) NULL,
	[ValidFrom] [datetime] NULL,
	[ValidTo] [datetime] NULL,
	[FailedLoginAttempts] [tinyint] NULL,
	[PasswordChangeDate] [date] NULL,
	[ForcePasswordChange] [bit] NULL,
	[LoginStatus] [smallint] NULL,
	[ChangedDate] [datetime] NOT NULL,
	[ChangedBy] [uniqueidentifier] NULL,
	[DefaultRedirect] [nvarchar](256) NULL,
	[Super] [tinyint] NOT NULL,
 CONSTRAINT [PK_User] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbAccount2Role]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbAccount2Role](
	[RoleId] [uniqueidentifier] NOT NULL,
	[AccountId] [uniqueidentifier] NOT NULL,
 CONSTRAINT [PK_User2Role] PRIMARY KEY CLUSTERED 
(
	[AccountId] ASC,
	[RoleId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbAgency]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbAgency](
	[Id] [uniqueidentifier] NOT NULL,
	[DisplayName] [nvarchar](500) NULL,
	[BankAccount] [varchar](50) NULL,
	[Email] [varchar](256) NULL,
	[Phone] [varchar](16) NULL,
	[Address] [nvarchar](256) NULL,
	[IPAllow] [varchar](500) NULL,
	[Status] [tinyint] NULL,
	[CreatedBy] [uniqueidentifier] NOT NULL,
	[CreatedDate] [datetime] NULL,
	[ChangedDate] [datetime] NULL,
	[ChangedBy] [uniqueidentifier] NOT NULL,
 CONSTRAINT [PK_Agency] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbCatalog]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbCatalog](
	[Id] [uniqueidentifier] NOT NULL,
	[FacilityId] [uniqueidentifier] NOT NULL,
	[Code] [nvarchar](256) NULL,
	[VGSId] [uniqueidentifier] NOT NULL,
	[Status] [smallint] NULL,
	[ChangedDate] [datetime] NULL,
	[ChangedBy] [uniqueidentifier] NOT NULL,
	[CreatedBy] [uniqueidentifier] NOT NULL,
	[CreatedDate] [datetime] NULL,
 CONSTRAINT [PK_Catalog] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbEvent]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbEvent](
	[Id] [uniqueidentifier] NOT NULL,
	[CatalogId] [uniqueidentifier] NULL,
	[VGSId] [uniqueidentifier] NOT NULL,
	[Code] [varchar](32) NOT NULL,
	[Status] [tinyint] NULL,
	[CreatedBy] [uniqueidentifier] NOT NULL,
	[CreatedDate] [datetime] NULL,
	[ChangedDate] [datetime] NULL,
	[ChangedBy] [uniqueidentifier] NOT NULL,
 CONSTRAINT [PK_Event] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbFacility]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbFacility](
	[Id] [uniqueidentifier] NOT NULL,
	[DisplayName] [nvarchar](100) NULL,
	[Code] [varchar](32) NOT NULL,
	[ServiceUrl] [varchar](256) NOT NULL,
	[WorkStationId] [uniqueidentifier] NOT NULL,
	[SaleChannelId] [uniqueidentifier] NOT NULL,
	[Status] [smallint] NULL,
	[ChangedDate] [datetime] NULL,
	[ChangedBy] [uniqueidentifier] NOT NULL,
	[SurveyId] [uniqueidentifier] NULL,
	[CreatedBy] [uniqueidentifier] NULL,
	[CreatedDate] [datetime] NULL,
 CONSTRAINT [PK_Facility_Id] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbFeature]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbFeature](
	[Id] [uniqueidentifier] NOT NULL,
	[Code] [varchar](32) NOT NULL,
	[DisplayName] [nvarchar](50) NOT NULL,
	[RightValue] [ntext] NOT NULL,
	[GroupId] [uniqueidentifier] NULL,
	[Icon] [varchar](50) NULL,
	[Sort] [tinyint] NULL,
 CONSTRAINT [PK_Function] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbFeatureDetail]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbFeatureDetail](
	[Id] [uniqueidentifier] NOT NULL,
	[FeatureId] [uniqueidentifier] NOT NULL,
	[DisplayName] [nvarchar](50) NOT NULL,
	[RightValue] [varchar](50) NULL,
	[Icon] [varchar](50) NULL,
	[Sort] [tinyint] NULL,
 CONSTRAINT [PK_FunctionDetail] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbFeatureGroup]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbFeatureGroup](
	[Id] [uniqueidentifier] NOT NULL,
	[Code] [varchar](20) NOT NULL,
	[DisplayName] [nvarchar](50) NOT NULL,
	[Sort] [tinyint] NOT NULL,
	[Icon] [varchar](50) NOT NULL,
 CONSTRAINT [PK_FunctionGroup] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbLogin]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbLogin](
	[Id] [uniqueidentifier] NOT NULL,
	[AccountId] [uniqueidentifier] NULL,
	[Token] [varchar](64) NULL,
	[ValidFrom] [datetime] NULL,
	[ValidTo] [datetime] NULL,
	[IP] [varchar](20) NULL,
	[Agent] [nvarchar](256) NULL,
	[Value] [nvarchar](256) NULL,
	[Facility] [varchar](256) NULL,
 CONSTRAINT [PK_Login] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbOrganization]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbOrganization](
	[Id] [uniqueidentifier] NOT NULL,
	[DisplayName] [nvarchar](500) NULL,
	[BankAccount] [varchar](50) NULL,
	[Email] [varchar](256) NULL,
	[Phone] [varchar](16) NULL,
	[Address] [nvarchar](256) NULL,
	[IPAllow] [varchar](500) NULL,
	[Status] [tinyint] NULL,
	[CreatedBy] [uniqueidentifier] NOT NULL,
	[CreatedDate] [datetime] NULL,
	[ChangedDate] [datetime] NULL,
	[ChangedBy] [uniqueidentifier] NOT NULL,
 CONSTRAINT [PK_Organization] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbOrganization2Facility]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbOrganization2Facility](
	[OrganizationId] [uniqueidentifier] NOT NULL,
	[FacilityId] [uniqueidentifier] NOT NULL,
 CONSTRAINT [PK_Organization2Facility] PRIMARY KEY CLUSTERED 
(
	[FacilityId] ASC,
	[OrganizationId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbRight]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbRight](
	[Id] [uniqueidentifier] NOT NULL,
	[RoleId] [uniqueidentifier] NOT NULL,
	[FeatureId] [uniqueidentifier] NOT NULL,
	[RightValue] [ntext] NOT NULL,
 CONSTRAINT [PK_Right] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbRole]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbRole](
	[Id] [uniqueidentifier] NOT NULL,
	[Code] [varchar](32) NOT NULL,
	[DisplayName] [nvarchar](50) NOT NULL,
	[ChangedDate] [datetime] NOT NULL,
	[ChangedBy] [uniqueidentifier] NOT NULL,
 CONSTRAINT [PK_Role] PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbRole2Facility]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbRole2Facility](
	[RoleId] [uniqueidentifier] NOT NULL,
	[FacilityId] [uniqueidentifier] NOT NULL,
 CONSTRAINT [PK_Role2Facility] PRIMARY KEY CLUSTERED 
(
	[FacilityId] ASC,
	[RoleId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tbTranslation]    Script Date: 6/16/2020 5:16:16 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbTranslation](
	[Id] [uniqueidentifier] NOT NULL,
	[EntityId] [varchar](36) NOT NULL,
	[Language] [varchar](10) NULL,
	[Value] [nvarchar](500) NULL,
	[Description] [nvarchar](500) NULL,
	[Status] [smallint] NOT NULL
) ON [PRIMARY]
GO
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'22e3d448-ae97-4891-a935-25c494b0728c', 1, N'admin01', NULL, N'$2y$10$uxGdWI5uCdSSsFCePTWcIeLnByVZHQDKvf/.6w9zycIA.4FNKrc72', N'admin01', N'admin01@gmail.com', N'0329777862', NULL, NULL, 0, CAST(N'2020-06-02' AS Date), 1, 2, CAST(N'2020-06-11T15:52:18.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', NULL, 2)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'5af8409c-3e5f-42af-b25a-2dc663a56b89', 2, N'demo05', NULL, N'$2y$10$xV0umIBVajbf4Sa/VLsRZuqqjTujWrdW58C8VWrpGv1IFw2LcWNfO', N'demo03', N'demo05@gmail.com', N'0329777862', NULL, NULL, 0, CAST(N'2020-06-02' AS Date), 1, 2, CAST(N'2020-06-02T17:34:47.000' AS DateTime), NULL, NULL, 2)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'9d96fd5c-6183-406f-8fa9-353a00de0fa9', 3, N'admin02', NULL, N'$2y$10$a43vf2x8tlc/G8Dt7IbH5OFG.PsdswHY6w6vof3ML/E4.w./ZG4jO', N'Trung Kiên', N'kienvt01@sungroup.com.vn', N'0329777862', NULL, NULL, 0, CAST(N'2020-05-20' AS Date), 1, 2, CAST(N'2020-06-10T22:49:38.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', NULL, 2)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'50f63405-364c-4c44-92b2-42cdd974528e', 1, N'demo03', NULL, N'$2y$10$ph4loREF7rkEaBedHG9TnOCGLa6h0BDIspw6FGCAUG5e2b4TBmDBO', N'demo03', N'demo03@gmail.com', N'0329777862', NULL, NULL, 0, CAST(N'2020-06-02' AS Date), 1, 2, CAST(N'2020-06-02T17:28:17.000' AS DateTime), NULL, NULL, 2)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'1c968176-8c00-4b9a-aa43-577bda87f573', 1, N'admin03', NULL, N'$2y$10$.CGwgjNs8EKo2/DJ3d8voegcdznVjlkL.Ocn6LaWqSRKznjp/gcY6', N'admin03', N'admin02@gmail.com', NULL, NULL, NULL, 0, CAST(N'2020-06-10' AS Date), 1, 2, CAST(N'2020-06-10T22:38:34.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', NULL, 2)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'56a115ad-1602-4750-ac16-6257f3e6422e', 1, N'admin', NULL, N'$2y$10$m6JwVfr4g8SyzdDxr6iX1ukO5OgzPhIMvhEoNc1TgWZW5pHoU8KYS', N'Admin', N'admin@sungroup.com.vn', N'0329777862', NULL, NULL, 9, CAST(N'2020-05-20' AS Date), 0, 1, CAST(N'2020-06-09T14:37:24.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', NULL, 1)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'fea7ff8a-7902-4f08-970a-ca11efec7218', 3, N'adm023', NULL, N'$2y$10$eu2vnpev3tiCgxjRvYpHd.HqhusXx.y1Me8Ct6iDMVoYOD.2TZuuu', N'adm02', N'adm02@gmail.com', N'0329777862', NULL, NULL, 0, CAST(N'2020-06-02' AS Date), 1, 2, CAST(N'2020-06-11T15:24:46.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', NULL, 2)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'138b1d0e-24fe-4217-acb0-cf981c850222', 1, N'kienvt01', NULL, N'$2y$10$22Mb8L3HxW9eEEuFzSSKxuiv1cnbzwKxAOkOvz8Xaap6Hk74Uouby', N'kienvt01', N'kienvt01@gmail.com', N'0329777862', NULL, NULL, 0, CAST(N'2020-05-20' AS Date), 1, 2, CAST(N'2020-06-10T23:14:50.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', NULL, 2)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'e5a5f024-cd79-4853-8042-df0f5b94d3c4', 3, N'People', NULL, N'$2y$10$GKVQzrBUGs7I1OJw2s/7meVx7BcDgv4u2c7Otf319eZnKTF1pDmDO', N'People', N'people@gmail.com', NULL, NULL, NULL, 0, CAST(N'2020-06-04' AS Date), 1, 2, CAST(N'2020-06-04T08:54:01.000' AS DateTime), NULL, NULL, 2)
INSERT [dbo].[tbAccount] ([Id], [Status], [Code], [Hash], [Password], [DisplayName], [Email], [Phone], [ValidFrom], [ValidTo], [FailedLoginAttempts], [PasswordChangeDate], [ForcePasswordChange], [LoginStatus], [ChangedDate], [ChangedBy], [DefaultRedirect], [Super]) VALUES (N'2bf24ec3-c141-4a9a-be2f-f23e32621ede', 3, N'demo06', NULL, N'$2y$10$6WA.NDQQDGH0ZCsGUXKUnuu48Kr37ghdHKl6VapCDiN3JKTdkpvt6', N'demo06', N'demo06@gmail.com', N'0329777862', NULL, NULL, 0, CAST(N'2020-06-02' AS Date), 1, 2, CAST(N'2020-06-02T17:38:22.000' AS DateTime), NULL, NULL, 2)
INSERT [dbo].[tbAccount2Role] ([RoleId], [AccountId]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'22e3d448-ae97-4891-a935-25c494b0728c')
INSERT [dbo].[tbAccount2Role] ([RoleId], [AccountId]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'56a115ad-1602-4750-ac16-6257f3e6422e')
INSERT [dbo].[tbAccount2Role] ([RoleId], [AccountId]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'fea7ff8a-7902-4f08-970a-ca11efec7218')
INSERT [dbo].[tbAccount2Role] ([RoleId], [AccountId]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'e5a5f024-cd79-4853-8042-df0f5b94d3c4')
INSERT [dbo].[tbAccount2Role] ([RoleId], [AccountId]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'2bf24ec3-c141-4a9a-be2f-f23e32621ede')
INSERT [dbo].[tbCatalog] ([Id], [FacilityId], [Code], [VGSId], [Status], [ChangedDate], [ChangedBy], [CreatedBy], [CreatedDate]) VALUES (N'6c17e3e3-1b1f-456f-871c-0edfee143eb0', N'c7aeed60-d25e-4b60-9c76-9ecb95dbb111', N'Kien', N'86fa726f-0d66-4ce3-8bc6-5e2a757b33bd', 1, CAST(N'2020-06-15T11:46:42.180' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', N'56a115ad-1602-4750-ac16-6257f3e6422e', CAST(N'2020-06-15T11:46:42.180' AS DateTime))
INSERT [dbo].[tbCatalog] ([Id], [FacilityId], [Code], [VGSId], [Status], [ChangedDate], [ChangedBy], [CreatedBy], [CreatedDate]) VALUES (N'da6c3045-ffd6-463c-a273-364b9eaae150', N'07b91c8d-3843-444b-bbeb-ba270ed7c0fa', N'en-name', N'51028baa-d45c-4b62-b210-e8fc984cfab5', 1, CAST(N'2020-06-14T03:25:32.927' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', N'56a115ad-1602-4750-ac16-6257f3e6422e', CAST(N'2020-06-14T03:25:32.927' AS DateTime))
INSERT [dbo].[tbCatalog] ([Id], [FacilityId], [Code], [VGSId], [Status], [ChangedDate], [ChangedBy], [CreatedBy], [CreatedDate]) VALUES (N'53321913-70bb-494c-b7df-e2021139355e', N'86fa726f-0d66-4ce3-8bc6-5e2a757b33bd', N'Event-Kien', N'd30d835e-91ef-48e0-8861-a310d037092e', 3, CAST(N'2020-06-15T14:22:49.307' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', N'56a115ad-1602-4750-ac16-6257f3e6422e', CAST(N'2020-06-15T14:22:49.307' AS DateTime))
INSERT [dbo].[tbEvent] ([Id], [CatalogId], [VGSId], [Code], [Status], [CreatedBy], [CreatedDate], [ChangedDate], [ChangedBy]) VALUES (N'c35afff4-c67a-4a93-98ea-054d5d2ac0a8', N'da6c3045-ffd6-463c-a273-364b9eaae150', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'Event-Kien', 3, N'56a115ad-1602-4750-ac16-6257f3e6422e', CAST(N'2020-06-15T14:27:45.517' AS DateTime), CAST(N'2020-06-15T14:27:45.517' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e')
INSERT [dbo].[tbEvent] ([Id], [CatalogId], [VGSId], [Code], [Status], [CreatedBy], [CreatedDate], [ChangedDate], [ChangedBy]) VALUES (N'd30d835e-91ef-48e0-8861-a310d037092e', N'da6c3045-ffd6-463c-a273-364b9eaae150', N'07b91c8d-3843-444b-bbeb-ba270ed7c0fa', N'Event-2', 3, N'56a115ad-1602-4750-ac16-6257f3e6422e', CAST(N'2020-06-15T13:50:09.727' AS DateTime), CAST(N'2020-06-15T13:50:09.727' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e')
INSERT [dbo].[tbFacility] ([Id], [DisplayName], [Code], [ServiceUrl], [WorkStationId], [SaleChannelId], [Status], [ChangedDate], [ChangedBy], [SurveyId], [CreatedBy], [CreatedDate]) VALUES (N'86fa726f-0d66-4ce3-8bc6-5e2a757b33bd', NULL, N'HL', N'http://localhost:8080/general/facility/create', N'b4bf27cd-3744-4def-82cc-49c44a9ba155', N'b4bf27cd-3744-4def-82cc-49c44a9ba155', 1, CAST(N'2020-06-11T10:58:04.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', N'b4bf27cd-3744-4def-82cc-49c44a9ba155', N'56a115ad-1602-4750-ac16-6257f3e6422e', CAST(N'2020-06-10T14:25:26.000' AS DateTime))
INSERT [dbo].[tbFacility] ([Id], [DisplayName], [Code], [ServiceUrl], [WorkStationId], [SaleChannelId], [Status], [ChangedDate], [ChangedBy], [SurveyId], [CreatedBy], [CreatedDate]) VALUES (N'c7aeed60-d25e-4b60-9c76-9ecb95dbb111', NULL, N'code-234', N'http://localhost:8080/general/facilities/create', N'c4cf11c8-b0da-4321-8ca9-1cbf4f060098', N'c4cf11c8-b0da-4321-8ca9-1cbf4f060098', 1, CAST(N'2020-06-14T16:33:30.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', N'c4cf11c8-b0da-4321-8ca9-1cbf4f060098', N'56a115ad-1602-4750-ac16-6257f3e6422e', CAST(N'2020-06-10T14:25:26.000' AS DateTime))
INSERT [dbo].[tbFacility] ([Id], [DisplayName], [Code], [ServiceUrl], [WorkStationId], [SaleChannelId], [Status], [ChangedDate], [ChangedBy], [SurveyId], [CreatedBy], [CreatedDate]) VALUES (N'07b91c8d-3843-444b-bbeb-ba270ed7c0fa', NULL, N'code-abc', N'http://localhost:8080/general/facility/create?tab=1', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', 3, CAST(N'2020-06-11T13:57:48.000' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', NULL, CAST(N'2020-06-10T14:25:26.000' AS DateTime))
INSERT [dbo].[tbFeature] ([Id], [Code], [DisplayName], [RightValue], [GroupId], [Icon], [Sort]) VALUES (N'805a8f08-391d-4d16-b46c-39e9f3caf419', N'Event', N'Events', N'read,create,edit,delete', N'd65c7f8b-ce88-4c7e-ac12-dd444c24647b', N'fas fa-list-alt', 3)
INSERT [dbo].[tbFeature] ([Id], [Code], [DisplayName], [RightValue], [GroupId], [Icon], [Sort]) VALUES (N'80a82ab7-1d19-4f17-a57e-52cccc530e1e', N'Role', N'Security Roles', N'read,create,edit,delete', N'29977ba1-6b47-4136-9bb2-655ce35346f4', N'fas fa-users', 2)
INSERT [dbo].[tbFeature] ([Id], [Code], [DisplayName], [RightValue], [GroupId], [Icon], [Sort]) VALUES (N'3047bd73-b1dd-4240-b627-5c70aaf3fcef', N'People', N'People', N'read,create,edit,delete', N'29977ba1-6b47-4136-9bb2-655ce35346f4', N'fas fa-address-card', 1)
INSERT [dbo].[tbFeature] ([Id], [Code], [DisplayName], [RightValue], [GroupId], [Icon], [Sort]) VALUES (N'45ed262d-bb18-438e-bf68-809cdce8a370', N'Catalog', N'Catalogs', N'read, create, edit, delete', N'd65c7f8b-ce88-4c7e-ac12-dd444c24647b', N'fas fa-swatchbook', 2)
INSERT [dbo].[tbFeature] ([Id], [Code], [DisplayName], [RightValue], [GroupId], [Icon], [Sort]) VALUES (N'fb93fd0d-9c10-446d-b82e-8612ab6e2d96', N'Facility', N'Facilities', N'read, create, edit, delete', N'd65c7f8b-ce88-4c7e-ac12-dd444c24647b', N'fas fa-sign', 1)
INSERT [dbo].[tbFeature] ([Id], [Code], [DisplayName], [RightValue], [GroupId], [Icon], [Sort]) VALUES (N'9b9e4515-d9cd-4e56-9e60-ac8c06cc6f9b', N'Organization', N'Organizations', N'read,create,edit,delete', N'5bb8e4c9-2900-41c8-b81b-987597c2825a', N'fas fa-hotel', 1)
INSERT [dbo].[tbFeature] ([Id], [Code], [DisplayName], [RightValue], [GroupId], [Icon], [Sort]) VALUES (N'8bacdeb4-4d72-4f9c-9ff8-aea997fb4062', N'Account', N'Accounts', N'read,create,edit,delete', N'5bb8e4c9-2900-41c8-b81b-987597c2825a', N'fas fa-users', 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'5f045e2d-728b-4b8d-9595-1c5103efafb8', N'fb93fd0d-9c10-446d-b82e-8612ab6e2d96', N'Edit Facility', N'edit', NULL, 3)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'14ae15c1-36d7-4133-84ff-1f54a7279df3', N'fb93fd0d-9c10-446d-b82e-8612ab6e2d96', N'Delete Facility', N'delete', NULL, 4)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'f1f22755-3a45-49cd-a5a0-21628448421f', N'9b9e4515-d9cd-4e56-9e60-ac8c06cc6f9b', N'View List Organization', N'read', NULL, 1)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'75333c3e-c62a-4ad0-b47d-218b6189bc10', N'3047bd73-b1dd-4240-b627-5c70aaf3fcef', N'Create New Person', N'create', NULL, 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'2ebcee3c-3d19-4aa6-b326-26d015f4fe39', N'45ed262d-bb18-438e-bf68-809cdce8a370', N'Edit Catalog', N'edit', NULL, 3)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'91f43786-99e8-4f2b-97f8-2c2b833e1d58', N'80a82ab7-1d19-4f17-a57e-52cccc530e1e', N'Create New Role', N'create', NULL, 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'f0ef44e1-9572-4c17-911f-2f9aadb20a68', N'45ed262d-bb18-438e-bf68-809cdce8a370', N'View List Catalog', N'read', NULL, 1)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'b4a86bcc-9747-4508-8845-3a5b3c9352e1', N'80a82ab7-1d19-4f17-a57e-52cccc530e1e', N'Delete Roles', N'delete', NULL, 4)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'cf30f0f5-b90e-4b3a-bb24-3ab198eafdf4', N'3047bd73-b1dd-4240-b627-5c70aaf3fcef', N'Delete People', N'delete', NULL, 4)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'204238fd-3216-471e-9c32-45fb6b2b4c1f', N'9b9e4515-d9cd-4e56-9e60-ac8c06cc6f9b', N'Edit Organization', N'edit', NULL, 3)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'de37ba92-f692-4482-8223-4d87f5a700cc', N'80a82ab7-1d19-4f17-a57e-52cccc530e1e', N'View List Roles', N'read', NULL, 1)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'ed11f12e-b159-4907-a1fe-50241eb013f9', N'9b9e4515-d9cd-4e56-9e60-ac8c06cc6f9b', N'Create Organization', N'create', NULL, 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'e0aea0f5-4866-4b9e-a5ee-5469ef575a63', N'45ed262d-bb18-438e-bf68-809cdce8a370', N'Delete Catalog', N'delete', NULL, 4)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'55c53165-9c69-4363-b82f-582082263153', N'8bacdeb4-4d72-4f9c-9ff8-aea997fb4062', N'Edit Account', N'edit', NULL, 3)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'715fc976-4020-4c37-a4fb-5900ddfa5a75', N'805a8f08-391d-4d16-b46c-39e9f3caf419', N'View List Event', N'read', NULL, 1)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'67b5e6fe-8221-4358-ba68-5ba4acab142e', N'9b9e4515-d9cd-4e56-9e60-ac8c06cc6f9b', N'Delete Organization', N'delete', NULL, 4)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'dac7174d-9dec-4259-be95-5c80fa820047', N'8bacdeb4-4d72-4f9c-9ff8-aea997fb4062', N'Create Account', N'create', NULL, 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'a8ec7b4f-17f7-472a-b9c7-61fd86b00d3d', N'3047bd73-b1dd-4240-b627-5c70aaf3fcef', N'Edit Person', N'edit', NULL, 3)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'b89fa4b0-d48c-496e-b7ee-7c8fd2ddb01c', N'805a8f08-391d-4d16-b46c-39e9f3caf419', N'Delete Event', N'delete', NULL, 4)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'7f76ac6b-7e7a-4c6d-afb3-7ea844af729f', N'45ed262d-bb18-438e-bf68-809cdce8a370', N'Create Catalog', N'create', NULL, 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'24848deb-3973-4813-b820-944a5ea1babb', N'805a8f08-391d-4d16-b46c-39e9f3caf419', N'Edit Event', N'edit', NULL, 3)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'b16e9cff-4e97-4b67-ad8b-99c50c81440f', N'3047bd73-b1dd-4240-b627-5c70aaf3fcef', N'View List People', N'read', NULL, 1)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'5d2c0eda-eeb0-4e86-a48a-a2f4f22f8b1f', N'fb93fd0d-9c10-446d-b82e-8612ab6e2d96', N'Create Facility', N'create', NULL, 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'a4a9792d-2cd9-46f8-9855-aa647318f894', N'80a82ab7-1d19-4f17-a57e-52cccc530e1e', N'Edit Role', N'edit', NULL, 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'581a3c3e-342e-4102-ab27-b1be5b5f9b26', N'8bacdeb4-4d72-4f9c-9ff8-aea997fb4062', N'Delete Account', N'delete', NULL, 4)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'c781eb17-0d41-494c-af94-bafc43b1a7d3', N'fb93fd0d-9c10-446d-b82e-8612ab6e2d96', N'View List Facility', N'read', NULL, 1)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'31102af4-e829-4083-99d6-c8f0d99a9ed7', N'805a8f08-391d-4d16-b46c-39e9f3caf419', N'Create Event', N'create', NULL, 2)
INSERT [dbo].[tbFeatureDetail] ([Id], [FeatureId], [DisplayName], [RightValue], [Icon], [Sort]) VALUES (N'4e2c8220-4bfa-4f5c-8d04-d6ad6de9b82b', N'8bacdeb4-4d72-4f9c-9ff8-aea997fb4062', N'View List Account', N'read', NULL, 1)
INSERT [dbo].[tbFeatureGroup] ([Id], [Code], [DisplayName], [Sort], [Icon]) VALUES (N'29977ba1-6b47-4136-9bb2-655ce35346f4', N'Accounts', N'Accounts', 1, N'fas fa-user')
INSERT [dbo].[tbFeatureGroup] ([Id], [Code], [DisplayName], [Sort], [Icon]) VALUES (N'5bb8e4c9-2900-41c8-b81b-987597c2825a', N'TA', N'Travel Agencies', 3, N'fas fa-campground')
INSERT [dbo].[tbFeatureGroup] ([Id], [Code], [DisplayName], [Sort], [Icon]) VALUES (N'd65c7f8b-ce88-4c7e-ac12-dd444c24647b', N'General', N'General', 2, N'fas fa-rainbow')
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'bb119d2d-9f36-4f6f-b331-0d034f83a37a', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'Zpsty78dOIu9rPvvwCoeRPeIYvFYm2Kx7bfGWyQFkZNItmoiA5BFfQwyVjjFHwBP', CAST(N'2020-06-10T13:35:15.263' AS DateTime), CAST(N'2020-06-10T17:34:28.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'946af745-7698-4de8-a971-1120910583c7', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'Uy77Ui7EtWM1s5CtIVOLY1imxO7Rna2jn7AWrGCh5k6MMLZ05ShqCaqHzOfoAstJ', NULL, CAST(N'2020-06-11T17:43:48.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'ec835b40-e88f-47a8-b862-20ce3a1a7389', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'k6UCPupjEZRPRpjlzAfZyAB3c1iQ7pV28VgP4oM6dyv3rvSmhmfPvuY413kkTmjT', NULL, CAST(N'2020-06-16T12:28:32.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'a3f0c0ea-80b4-4d77-b692-26c1860637bc', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'AHAwCd1ZJtW4awZ7X5eovqsTTZJwDrLeFnEAradqX11ilIav8YmJcMcmm0wWcthV', NULL, CAST(N'2020-06-12T23:43:00.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'ea8981fd-f7ac-40fa-b2bf-283bacac10e2', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'nOlSSCKHpdrwvE3XTF139O3hKCg6h0f7KtcOUHVFaaQjYOXlSfHXOY8BkTTdv8a1', NULL, CAST(N'2020-06-14T22:43:03.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'7e566583-89fd-418c-b49b-2efcf65bbd2c', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'1oujpGLVcnAMvm2vrzkw3N3qJMAowQ2KfznfEuX1VzETCRaRLBXoDbUWHiTvIQbY', CAST(N'2020-06-10T11:34:18.777' AS DateTime), CAST(N'2020-06-10T12:04:38.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'76599473-832c-4548-b96b-3c81ebbe73d7', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'3dv3tBe7iPgTLNBXkNAFJs7nBW0xJTlNR1yzZhWoeN6WUFd2v0gBq74qciN2tbCs', NULL, CAST(N'2020-06-15T20:23:26.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'f4843e85-6c32-46c5-a486-3dc3051c5787', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'SGthGaWZdV7vZNLLcXlioFiQMKJ8nUfvWcD24xMyBJ5cVF8HzzYq8dMDvuEnWYXQ', NULL, CAST(N'2020-06-16T11:28:40.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'ffec9a2d-07c8-42a1-bd8a-40f1e3ccfb69', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'fTxnWi0dy79KPrSjz9bV2cKYEwo2sPjon3GcPvJbjYSTsOkmRFmjsdT6Fn8GQBtX', NULL, CAST(N'2020-06-13T23:47:41.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'ae58162a-6955-43e6-863b-4443579c894e', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'ZZKvSMIvfW1eUBDAwCqx9wb33K0bmHAjLGCvJ9gGJwY54CRJc7L85x3nYM7qWzMV', NULL, CAST(N'2020-06-16T14:07:11.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'020ac351-3401-4e5f-a525-4cf03f526b5e', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'wCRtDWKQLqiIYw0lg8CUA4Tc0dOCNUbFRvU7ydURvRXXzCLLgRejHZPVimDVZIEV', CAST(N'2020-06-10T10:13:15.193' AS DateTime), CAST(N'2020-06-10T11:01:41.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'c6a80ab2-3a8c-49b2-9991-787db827734e', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'lXAyNCGF67GpyxE8TZ06MttSJQZRCdqtgnYsjOVlDr6oSTyRzrYsulhahwU3kfDl', NULL, CAST(N'2020-06-16T15:33:46.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'b7c1da34-d50d-4cbe-8c94-7f62d3a61e0f', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'dH9PjX2FEWnA2ogy1vszgHtj0xFd9HDjAhsWhXvR27LsOKaSR6PUwILCfFv1Jk5g', NULL, CAST(N'2020-06-11T08:53:29.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'c0b07f49-83a5-4857-85aa-8b0fb76681e3', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'J0KSlRDMVxBuElSny5S8biNe0MHQlww7SX4mSFm7Tmr3ugSihlTRCia8qmkkHAWG', NULL, CAST(N'2020-06-14T03:58:30.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'd2e4678a-b493-4dbc-881d-a616e666ebc3', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'DwOsnpppF1CQXffwESu0O0Ia0HuFzYsRQfrKodka5tDgd1mEjbAeYQh7SbuqPNmR', NULL, CAST(N'2020-06-15T14:55:42.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'9c7829e1-be3d-4b4e-8e46-b47dccf80477', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'iDvjZNjLfcYtdQXxiikxPdZSrX5V3g1sxStqzhDTP2BY7bDUJczGXhUx5Ys1Sgpw', NULL, CAST(N'2020-06-16T10:04:19.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'046a8b4f-8879-4763-a915-c4da4018fb69', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'Bea9AhmeXe0QwLc7WftC1hXHKrQfO7O8b6g22WWeI1852zPS3LEWt6oyAW2A3Q0B', NULL, CAST(N'2020-06-15T13:06:46.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'06375bd7-50f1-4bce-ab93-cc5578be4569', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'omi8gcrFG5Svl7EJUgC64XdDbWEGwrljZFLsj8PnUHecwEu0mI6rs2bHT7NbQZUt', NULL, CAST(N'2020-06-10T23:44:50.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'b3bee0ad-6b6e-488e-8ae7-e1b2b7d47dd5', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'OGBNOvUDW60hj7ZHAair2wANEGRX7t27TPQdUNLt1aZImvrqombF4vrWw5B1wNle', NULL, CAST(N'2020-06-14T17:41:08.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'f41030bf-d961-4ebc-9c61-e3be64fcfcc6', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'sna1OnASPj5d7mZCGgT0H4aUPZiC5Rr6Zepxl01ylPonfbRL385VObWzPkrmRbJx', CAST(N'2020-06-10T11:54:33.993' AS DateTime), CAST(N'2020-06-10T12:22:29.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'82e52476-bf68-40ca-83bc-eb3f0d47ac48', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'tVtvZLgyTFLozVkea4TPC5n3MG7zfRFy2wcTZpzOCZBTfz4tolJ5UV00tt7chkEs', NULL, CAST(N'2020-06-11T12:23:52.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbLogin] ([Id], [AccountId], [Token], [ValidFrom], [ValidTo], [IP], [Agent], [Value], [Facility]) VALUES (N'a8ddc788-e916-4626-92d7-f1bc738df1eb', N'56a115ad-1602-4750-ac16-6257f3e6422e', N'bRo1Xsdqvm8bSzgqkhMKUqa35zVhzqwxibLkbwzebr3Yg7TjS0zwgF9TPgqGMi3j', NULL, CAST(N'2020-06-16T17:15:42.000' AS DateTime), N'127.0.0.1', N'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', NULL, NULL)
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'49daa28b-9750-4193-9946-1bad2d0dd70a', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'805a8f08-391d-4d16-b46c-39e9f3caf419', N'read,create,edit,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'8809ca20-855a-433d-bc14-31fc6e6752d9', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'80a82ab7-1d19-4f17-a57e-52cccc530e1e', N'read,edit,create,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'a6660d7a-f272-430e-ba1e-35b33d58c47e', N'b72337fc-3cc4-4165-ac5c-5ec8366abb55', N'3047bd73-b1dd-4240-b627-5c70aaf3fcef', N'read,create,edit,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'557d1e17-d5bf-4dc2-a7a9-367986d260d8', N'b72337fc-3cc4-4165-ac5c-5ec8366abb55', N'45ed262d-bb18-438e-bf68-809cdce8a370', N'read,create,edit,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'330ad2d6-3f30-41e6-b681-5daa64948516', N'b72337fc-3cc4-4165-ac5c-5ec8366abb55', N'80a82ab7-1d19-4f17-a57e-52cccc530e1e', N'read,edit,create,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'f69d2f4e-8c91-4ffb-94aa-71e23f213c6d', N'14ef2181-e756-4d63-af61-28997c0baa7a', N'3047bd73-b1dd-4240-b627-5c70aaf3fcef', N'read,create,edit,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'3161e8a3-89b8-4ba3-9bd5-7a392c9237e5', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'9b9e4515-d9cd-4e56-9e60-ac8c06cc6f9b', N'read,create,edit,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'8271c137-d824-4d45-9317-b03fd43ca833', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'45ed262d-bb18-438e-bf68-809cdce8a370', N'read,create,edit,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'a686602e-d2ca-4524-aa5e-b46dd19e616e', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'3047bd73-b1dd-4240-b627-5c70aaf3fcef', N'read,create,edit,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'6c29a2bb-a2c6-4d3e-b50a-d3d8384d3863', N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'fb93fd0d-9c10-446d-b82e-8612ab6e2d96', N'read,create,edit,delete')
INSERT [dbo].[tbRight] ([Id], [RoleId], [FeatureId], [RightValue]) VALUES (N'60ccfbee-68ce-44f5-9bb2-ea7372800cba', N'b72337fc-3cc4-4165-ac5c-5ec8366abb55', N'fb93fd0d-9c10-446d-b82e-8612ab6e2d96', N'read,create,edit,delete')
INSERT [dbo].[tbRole] ([Id], [Code], [DisplayName], [ChangedDate], [ChangedBy]) VALUES (N'14ef2181-e756-4d63-af61-28997c0baa7a', N'Guest', N'Guest', CAST(N'2020-06-06T21:55:08.307' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e')
INSERT [dbo].[tbRole] ([Id], [Code], [DisplayName], [ChangedDate], [ChangedBy]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'Super-Admin', N'Super Admin', CAST(N'2020-05-15T15:20:54.740' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e')
INSERT [dbo].[tbRole] ([Id], [Code], [DisplayName], [ChangedDate], [ChangedBy]) VALUES (N'a2a1f138-3e49-40aa-9873-5380d639df43', N'ABc-COMPLEX', N'ABc-COMPLEX', CAST(N'2020-06-14T02:30:39.213' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e')
INSERT [dbo].[tbRole] ([Id], [Code], [DisplayName], [ChangedDate], [ChangedBy]) VALUES (N'b72337fc-3cc4-4165-ac5c-5ec8366abb55', N'ABC-SWHL-Admin', N'ABC-SWHL-Admin', CAST(N'2020-06-11T11:22:19.957' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e')
INSERT [dbo].[tbRole] ([Id], [Code], [DisplayName], [ChangedDate], [ChangedBy]) VALUES (N'e1dfcb96-3cba-4762-b3ef-974bf85751d7', N'admin-sunworld', N'admin-sunworld', CAST(N'2020-06-15T10:21:10.520' AS DateTime), N'56a115ad-1602-4750-ac16-6257f3e6422e')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'86fa726f-0d66-4ce3-8bc6-5e2a757b33bd')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'a2a1f138-3e49-40aa-9873-5380d639df43', N'86fa726f-0d66-4ce3-8bc6-5e2a757b33bd')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'b72337fc-3cc4-4165-ac5c-5ec8366abb55', N'86fa726f-0d66-4ce3-8bc6-5e2a757b33bd')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'e1dfcb96-3cba-4762-b3ef-974bf85751d7', N'86fa726f-0d66-4ce3-8bc6-5e2a757b33bd')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'14ef2181-e756-4d63-af61-28997c0baa7a', N'c7aeed60-d25e-4b60-9c76-9ecb95dbb111')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'c7aeed60-d25e-4b60-9c76-9ecb95dbb111')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'a2a1f138-3e49-40aa-9873-5380d639df43', N'c7aeed60-d25e-4b60-9c76-9ecb95dbb111')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'b72337fc-3cc4-4165-ac5c-5ec8366abb55', N'c7aeed60-d25e-4b60-9c76-9ecb95dbb111')
INSERT [dbo].[tbRole2Facility] ([RoleId], [FacilityId]) VALUES (N'20a11a27-2d19-45d9-9ec9-46ddbdd418ef', N'07b91c8d-3843-444b-bbeb-ba270ed7c0fa')
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'497d5101-3e89-4828-ab75-c7437c26e835', N'28CABB6E-1C98-4816-8E4C-F0002C30EB74', N'en', N'NAME EN', N'DES EN', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'0cdf8cb2-516b-4a06-8eaf-31bcfa7cecfa', N'28CABB6E-1C98-4816-8E4C-F0002C30EB74', N'vi', N'NAME VI', N'DES VI', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'60bf2141-64e7-4b5c-ba62-d6457c7c890e', N'86FA726F-0D66-4CE3-8BC6-5E2A757B33BD', N'en', N'Sun World Ha Long Complex', N'Sun World Ha Long Complex', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'0211640a-013e-4081-967f-832b148e4716', N'86FA726F-0D66-4CE3-8BC6-5E2A757B33BD', N'vi', N'Sun World Ha Long Complex', N'Sun World Ha Long Complex', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'5ca3ce70-33bb-4dec-bb30-99fdc0c65b68', N'07B91C8D-3843-444B-BBEB-BA270ED7C0FA', N'en', N'name en', N'des en', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'3d839b54-3403-456c-b2b1-de52888c2b0e', N'07B91C8D-3843-444B-BBEB-BA270ED7C0FA', N'vi', N'name vi', N'des vi', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'ae14f22c-8dbc-456f-be54-d15e46ba50a4', N'C7AEED60-D25E-4B60-9C76-9ECB95DBB111', N'en', N'ABC Complex', N'ABC Complex', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'e0396e00-2411-429c-b5b9-57d25ace6477', N'C7AEED60-D25E-4B60-9C76-9ECB95DBB111', N'vi', N'ABC Complex', N'ABC Complex', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'd738efb7-541e-488a-8ee4-efe430b56ee7', N'DA6C3045-FFD6-463C-A273-364B9EAAE150', N'en', N'Catalog 1 EN', N'Catalog 1 EN', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'd3204006-895e-470f-b1dc-cb1581954f11', N'DA6C3045-FFD6-463C-A273-364B9EAAE150', N'vi', N'Catalog 1 VI', N'Catalog 1 VI', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'ccc322ce-279c-4a75-b0e7-0474c787351c', N'D30D835E-91EF-48E0-8861-A310D037092E', N'en', N'Event-2', N'Event-2', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'0ffc4003-8d7a-44ab-baca-a9e7f0b06639', N'D30D835E-91EF-48E0-8861-A310D037092E', N'vi', N'Event-1', N'Event-1', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'd15fcc0d-b808-4dd6-81b4-6abae4b9d5b0', N'53321913-70bb-494c-b7df-e2021139355e', N'en', N'Event Kien', N'Event Kien', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'd311dfe2-38c0-4900-8ec2-df01d72c8baa', N'53321913-70bb-494c-b7df-e2021139355e', N'vi', N'Event Kien', N'Event Kien', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'6a55f881-a7ae-44c9-96a3-86747eb90677', N'c35afff4-c67a-4a93-98ea-054d5d2ac0a8', N'en', N'Event-Kien', N'Event-Kien', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'd6069663-e932-4301-89c8-e6291e53f5ca', N'c35afff4-c67a-4a93-98ea-054d5d2ac0a8', N'vi', N'Event-Kien', N'Event-Kien', 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'052f39f4-bf5a-4157-a72b-3ef9a6c99824', N'6C17E3E3-1B1F-456F-871C-0EDFEE143EB0', N'en', N'Kien', NULL, 1)
INSERT [dbo].[tbTranslation] ([Id], [EntityId], [Language], [Value], [Description], [Status]) VALUES (N'4b7e1d32-0652-46d6-a60b-7ddb6dac5de4', N'6C17E3E3-1B1F-456F-871C-0EDFEE143EB0', N'vi', N'Kien', NULL, 1)
SET ANSI_PADDING ON
GO
/****** Object:  Index [UQ_Account_AccountCode]    Script Date: 6/16/2020 5:16:16 PM ******/
ALTER TABLE [dbo].[tbAccount] ADD  CONSTRAINT [UQ_Account_AccountCode] UNIQUE NONCLUSTERED 
(
	[Code] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[tbAccount] ADD  CONSTRAINT [DF_tbAccount_Super]  DEFAULT ((2)) FOR [Super]
GO
ALTER TABLE [dbo].[tbAgency] ADD  CONSTRAINT [DF__tbAgency__Status__4B7734FF]  DEFAULT ((1)) FOR [Status]
GO
ALTER TABLE [dbo].[tbAgency] ADD  CONSTRAINT [DF_tbAgency_CreatedDate]  DEFAULT (getdate()) FOR [CreatedDate]
GO
ALTER TABLE [dbo].[tbAgency] ADD  CONSTRAINT [DF_tbAgency_ChangedDate]  DEFAULT (getdate()) FOR [ChangedDate]
GO
ALTER TABLE [dbo].[tbCatalog] ADD  CONSTRAINT [DF__tbCatalog__Statu__2EDAF651]  DEFAULT ((1)) FOR [Status]
GO
ALTER TABLE [dbo].[tbCatalog] ADD  CONSTRAINT [DF_tbCatalog_ChangedDate]  DEFAULT (getdate()) FOR [ChangedDate]
GO
ALTER TABLE [dbo].[tbCatalog] ADD  CONSTRAINT [DF_tbCatalog_CreatedDate]  DEFAULT (getdate()) FOR [CreatedDate]
GO
ALTER TABLE [dbo].[tbEvent] ADD  CONSTRAINT [DF_tbEvent_CreatedDate]  DEFAULT (getdate()) FOR [CreatedDate]
GO
ALTER TABLE [dbo].[tbEvent] ADD  CONSTRAINT [DF_tbEvent_ChangedDate]  DEFAULT (getdate()) FOR [ChangedDate]
GO
ALTER TABLE [dbo].[tbFacility] ADD  CONSTRAINT [DF__tbFacilit__Statu__778AC167]  DEFAULT ((1)) FOR [Status]
GO
ALTER TABLE [dbo].[tbFacility] ADD  CONSTRAINT [DF__tbFacilit__Chang__797309D9]  DEFAULT (getdate()) FOR [ChangedDate]
GO
ALTER TABLE [dbo].[tbFacility] ADD  CONSTRAINT [DF_tbFacility_CreatedDate]  DEFAULT (getdate()) FOR [CreatedDate]
GO
ALTER TABLE [dbo].[tbOrganization] ADD  CONSTRAINT [DF__tbOrganization__Status]  DEFAULT ((1)) FOR [Status]
GO
ALTER TABLE [dbo].[tbOrganization] ADD  CONSTRAINT [DF_tbOrganization_CreatedDate]  DEFAULT (getdate()) FOR [CreatedDate]
GO
ALTER TABLE [dbo].[tbOrganization] ADD  CONSTRAINT [DF_tbOrganization_ChangedDate]  DEFAULT (getdate()) FOR [ChangedDate]
GO
ALTER TABLE [dbo].[tbRole] ADD  CONSTRAINT [DF_tbRole_ChangedDateTime]  DEFAULT (getdate()) FOR [ChangedDate]
GO
ALTER TABLE [dbo].[tbTranslation] ADD  CONSTRAINT [DF__tbTransla__Statu__01142BA1]  DEFAULT ((1)) FOR [Status]
GO
ALTER TABLE [dbo].[tbAccount2Role]  WITH CHECK ADD  CONSTRAINT [FK_Account2Role_Account] FOREIGN KEY([AccountId])
REFERENCES [dbo].[tbAccount] ([Id])
GO
ALTER TABLE [dbo].[tbAccount2Role] CHECK CONSTRAINT [FK_Account2Role_Account]
GO
ALTER TABLE [dbo].[tbAccount2Role]  WITH CHECK ADD  CONSTRAINT [FK_Account2Role_Role] FOREIGN KEY([RoleId])
REFERENCES [dbo].[tbRole] ([Id])
GO
ALTER TABLE [dbo].[tbAccount2Role] CHECK CONSTRAINT [FK_Account2Role_Role]
GO
ALTER TABLE [dbo].[tbCatalog]  WITH CHECK ADD  CONSTRAINT [FK_Catalog_Facility] FOREIGN KEY([FacilityId])
REFERENCES [dbo].[tbFacility] ([Id])
GO
ALTER TABLE [dbo].[tbCatalog] CHECK CONSTRAINT [FK_Catalog_Facility]
GO
ALTER TABLE [dbo].[tbFeature]  WITH CHECK ADD  CONSTRAINT [FK_Feature_Group] FOREIGN KEY([GroupId])
REFERENCES [dbo].[tbFeatureGroup] ([Id])
GO
ALTER TABLE [dbo].[tbFeature] CHECK CONSTRAINT [FK_Feature_Group]
GO
ALTER TABLE [dbo].[tbFeatureDetail]  WITH CHECK ADD  CONSTRAINT [FK_FeatureDetail] FOREIGN KEY([FeatureId])
REFERENCES [dbo].[tbFeature] ([Id])
GO
ALTER TABLE [dbo].[tbFeatureDetail] CHECK CONSTRAINT [FK_FeatureDetail]
GO
ALTER TABLE [dbo].[tbLogin]  WITH CHECK ADD  CONSTRAINT [FK_Login_Account] FOREIGN KEY([AccountId])
REFERENCES [dbo].[tbAccount] ([Id])
GO
ALTER TABLE [dbo].[tbLogin] CHECK CONSTRAINT [FK_Login_Account]
GO
ALTER TABLE [dbo].[tbOrganization2Facility]  WITH CHECK ADD  CONSTRAINT [FK_Organization2Facility_Facility] FOREIGN KEY([FacilityId])
REFERENCES [dbo].[tbFacility] ([Id])
GO
ALTER TABLE [dbo].[tbOrganization2Facility] CHECK CONSTRAINT [FK_Organization2Facility_Facility]
GO
ALTER TABLE [dbo].[tbRight]  WITH CHECK ADD  CONSTRAINT [FK_Right_Feature] FOREIGN KEY([FeatureId])
REFERENCES [dbo].[tbFeature] ([Id])
GO
ALTER TABLE [dbo].[tbRight] CHECK CONSTRAINT [FK_Right_Feature]
GO
ALTER TABLE [dbo].[tbRight]  WITH CHECK ADD  CONSTRAINT [FK_Right_Role] FOREIGN KEY([RoleId])
REFERENCES [dbo].[tbRole] ([Id])
GO
ALTER TABLE [dbo].[tbRight] CHECK CONSTRAINT [FK_Right_Role]
GO
ALTER TABLE [dbo].[tbRole2Facility]  WITH CHECK ADD  CONSTRAINT [FK_Role2Facility_Facility] FOREIGN KEY([FacilityId])
REFERENCES [dbo].[tbFacility] ([Id])
GO
ALTER TABLE [dbo].[tbRole2Facility] CHECK CONSTRAINT [FK_Role2Facility_Facility]
GO
ALTER TABLE [dbo].[tbRole2Facility]  WITH CHECK ADD  CONSTRAINT [FK_Role2Facility_Role] FOREIGN KEY([RoleId])
REFERENCES [dbo].[tbRole] ([Id])
GO
ALTER TABLE [dbo].[tbRole2Facility] CHECK CONSTRAINT [FK_Role2Facility_Role]
GO
USE [master]
GO
ALTER DATABASE [TOS] SET  READ_WRITE 
GO
