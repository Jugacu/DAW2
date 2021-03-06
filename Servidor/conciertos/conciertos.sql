USE [Conciertos]
GO
/****** Object:  Table [dbo].[Actuacion]    Script Date: 26/11/2019 19:50:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Actuacion](
	[idActuacion] [int] IDENTITY(1,1) NOT NULL,
	[fecha] [date] NOT NULL,
	[hora] [time](7) NOT NULL,
	[grupo] [nvarchar](50) NOT NULL,
	[precio] [money] NOT NULL,
	[entradasDisponibles] [int] NOT NULL,
 CONSTRAINT [PkActuacion] PRIMARY KEY CLUSTERED 
(
	[idActuacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Noticias]    Script Date: 26/11/2019 19:50:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Noticias](
	[idnoticia] [bigint] IDENTITY(1,1) NOT NULL,
	[titular] [text] NOT NULL,
	[desarrollo] [text] NOT NULL,
 CONSTRAINT [PK_Noticias] PRIMARY KEY CLUSTERED 
(
	[idnoticia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Reserva]    Script Date: 26/11/2019 19:50:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Reserva](
	[idReserva] [int] IDENTITY(1,1) NOT NULL,
	[dni] [varchar](9) NOT NULL,
	[fecha] [date] NOT NULL,
	[hora] [time](7) NOT NULL,
	[idActuacion] [int] NOT NULL,
	[localidades] [int] NOT NULL,
	[pagado] [bit] NOT NULL,
 CONSTRAINT [PkReserva] PRIMARY KEY CLUSTERED 
(
	[idReserva] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Usuario]    Script Date: 26/11/2019 19:50:55 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Usuario](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[username] [nvarchar](20) NOT NULL,
	[password] [nvarchar](60) NOT NULL,
	[rol] [nvarchar](8) NULL DEFAULT ('user'),
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[username] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
ALTER TABLE [dbo].[Reserva]  WITH CHECK ADD  CONSTRAINT [FkActuacionNReserva] FOREIGN KEY([idActuacion])
REFERENCES [dbo].[Actuacion] ([idActuacion])
GO
ALTER TABLE [dbo].[Reserva] CHECK CONSTRAINT [FkActuacionNReserva]
GO
